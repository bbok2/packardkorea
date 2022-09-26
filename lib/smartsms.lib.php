<?php
/*
SMS 연동보안키, 서버IP 를 확인해서 SMS 를 전송한다.
80 bytes 이하는 SMS, 이상은 LMS 로 전송
*/

class SmartSMS {
    var $ApiKey = "04e1a4bc3bca85e78c6ed558f65006a5"; //연동키 26f40d046b8ffea6fd9e85a4fb2209be
    var $EncodingType = 'UTF-8'; //현재 사이트의 인코딩
    var $SendURL = 'http://msg.hhsoft.kr/api/v3/send.php'; //전송 API 주소
    var $DailyURL = 'http://msg.hhsoft.kr/api/v3/report.php';
    var $SendMode = 'REAL'; //TEST (금액차감 안함.실제발송안함), REAL(금액차감.실제발송)
    var $ReportMode = 'REAL';

    var $SendName; //보내는 사람 이름
    var $SendPhone; //보내는 사람 휴대전화번호
    var $ToName; //받는사람 이름
    var $ToPhone; //받는 사람 휴대전화
    var $SendMsg; //전송할 내용

    var $resultCD, $resultMsg; //전송 결과 0-이면 성공

    public function __construct(){
        $this->SendName = "맛닭꼬"; //보내는 사람 이름
        $this->SendPhone = "02-2029-8530"; //보내는 사람 전화번호

        $this->ToName = "맛닭꼬"; //기본 받는사람
        $this->ToPhone = "010-3012-3392"; //기본 받는번호
        $this->SendMsg = "";
    }

    private function toEncoding($str){ //설정에 따른 인코딩
        if ($this->EncodingType == 'EUC-KR') {
            return $this->toEuckr($str);
        }
        else {
            return $this->toUTF8($str);
        }
    }

    private function toUTF8($str){ //EUC-KR --> UTF8
        if (mb_check_encoding($str, 'UTF-8')) { //검사하는 인코딩과 문자열 인코딩이 동일하다면 그대로 리턴
            return $str;
        } else {
            return iconv("EUC-KR", "UTF-8", $str);
        }
    }

    private function toEuckr($str){ //UTF8 --> EUC-KR
        if (mb_check_encoding($str, 'EUC-KR')) { //검사하는 인코딩과 문자열 인코딩이 동일하다면 그대로 리턴
            return $str;
        } else {
            return iconv("UTF-8", "EUC-KR", $str);
        }
    }

    public function sendSMS($sendName='', $sendPhone='', $toName='', $toPhone='', $sendMsg='') {
        if ($sendName == '') { $sendName = $this->SendName; }
        if ($sendPhone == '') { $sendPhone = $this->SendPhone; }
        if ($toName == '') { $toName = $this->ToName; }
        if ($toPhone == '') { $toPhone = $this->ToPhone; }
        if ($sendMsg == '') { $sendMsg = $this->SendMsg; }

        if ($sendName == "") { return "보내는 사람 이름이 존재하지 않습니다."; }
        if ($sendPhone == "") { return "보내는 사람 연락처가 없습니다."; }
        if ($toName == "") { return "받는 사람의 이름이 존재하지 않습니다."; }
        if ($toPhone == "") { return "받는 사람의 휴대전화가 존재하지 않습니다."; }
        if ($sendMsg == "") { return "전송하려는 메시지가 존재하지 않습니다."; }

        /* 파라미터 생성 */
        $param = array("key"=>$this->ApiKey, 'mode'=>$this->SendMode, 'encoding'=>$this->EncodingType, "sndname"=>$this->toEncoding($sendName), "sndphone"=>$sendPhone,
            "recname"=>$this->toEncoding($toName), "recphone"=>$toPhone, "sndmsg"=>$this->toEncoding($sendMsg), "doc"=>"json");

        $rtn = $this->postRequest($this->SendURL, $param); // SMS 전송
        $rtn = $this->toEncoding($rtn);
        /*
        doc : text > 0|전송성공 , json > $rtn['stat'] = array('cd'=>$errcd, 'msg'=>$errmsg, 'remain'=>intval($this->Member['rmnAmt']));
        */
        //$rtn = explode("|", $rtn);
        $rtn = json_decode($rtn,true);
        $this->resultCD = $rtn['stat']['cd']; //0 성공, 이외 실패
        $this->resultMsg = $rtn['stat']['msg'];

        return $this->resultCD; //코드만 리턴
    }

    /**
     * 전송 목록 및 월간 통계 가져오기
     * @param string $yy 연도. 빈값이면 현재 연도
     * @param string $mm 월. 빈값이면 현재 월
     * @param string $vw 보기모드 빈값이면 list. list(전송 목록) or daily(해당월의 날짜별 통계)
     * @param string $rtnarray true 면 배열로, false 면 json 원문
     */
    public function getDailyList($yy='', $mm='', $vw='list', $rtnarray=true, $pageSize=20, $page=1, $sopt='', $sval='') { //$rtnarray=true-배얼, false=json
        if ($yy != 'ALL') {
            if ($yy == '' || !isset($yy)) { $yy = date('Y'); }
            if ($mm == '' || !isset($mm)) { $mm = date('m'); }
        }

        $param = array("key"=>$this->ApiKey, 'yy'=>$yy, 'mm'=>$mm, 'vw'=>$vw, 'pgsize'=>$pageSize, 'page'=>$page, 'sopt'=>$sopt, 'sval'=>$sval, 'mode'=>$this->ReportMode);
        $rtn = $this->postRequest($this->DailyURL, $param); // SMS 전송
        if ($rtnarray) {
            $rtn = json_decode($rtn,true);
        }
        return $rtn;
    }

    public function getRemain() { //json 으로 응답함
        $array = json_decode($this->getDailyList('','','',false), true);

        $rtn["cd"] = $array['stat']['cd'];
        $rtn["msg"] = $array['stat']['msg'];
        $rtn["remain"] = $array['stat']['remain'];

        return $rtn;
    }

    function postRequest($url, $data) {
        // 배열을 파라미터로 변경
        $data = http_build_query($data);

        //URL 파싱
        $url = parse_url($url);

        if ($url['scheme'] != 'http') {
            return "-200|Only HTTP request are supported!";
        }

        // extract host and path:
        $host = $url['host'];
        $path = $url['path'];
        $res = '';

        if ($fp = fsockopen($host, 80, $errno, $errstr, 300)) {
            $reqBody = $data;
            $reqHeader = "POST $path HTTP/1.1\r\n" . "Host: $host\r\n";
            $reqHeader .= "Content-type: application/x-www-form-urlencoded\r\n"
                . "Content-length: " . strlen($reqBody) . "\r\n"
                . "Connection: close\r\n\r\n";

            /* send request */
            fwrite($fp, $reqHeader);
            fwrite($fp, $reqBody);

            while(!feof($fp)) {
                $res .= fgets($fp, 1024);
            }

            fclose($fp);
        } else {
            return "-300|Error:Cannot Connect! ". $errstr;
        }

        // split the result header from the content
        $result = explode("\r\n\r\n", $res, 2);

        $header = isset($result[0]) ? $result[0] : '';
        $content = isset($result[1]) ? $result[1] : '';

        return $content;
    }
}

?>