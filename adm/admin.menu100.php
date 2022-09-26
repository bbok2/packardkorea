<?php
// $menu['menu100'] = array (
//     array('100000', '회원관리', G5_ADMIN_URL.'/member_list.php', 'member')
//     );


// $menu['menu200'] = array (
//     array('200000', '접속통계', G5_ADMIN_URL.'/visit_list.php', 'mb_visit', 1)
//     );

// $menu['menu300'] = array (
//     array('300000', '매장관리', G5_ADMIN_URL.'/store_list.php', 'mb_store')
//     );

// $menu['menu400'] = array (
//     array('400000', '메뉴관리', ''.G5_ADMIN_URL.'/product/list.php', 'bbs_board')
//     );

$menu["menu500"] = array (
    array('500000', '게시판관리', ''.G5_ADMIN_URL.'/board_list.php', 'board')
    );

// $menu["menu600"] = array (
//         array('600000', '상담신청', ''.G5_ADMIN_URL.'/qna/list.php', 'board'),    
//     array('600100', '창업 상담', ''.G5_ADMIN_URL.'/qna/list.php', 'bbs_board')
//     array('600200', '문자 상담', ''.G5_ADMIN_URL.'/qna/request.php', 'sms_write')
//     );
$menu["menu700"] = array (
    array('700100', '팝업관리', G5_ADMIN_URL.'/newwinlist.php', 'scf_poplayer'),
    );

    ?>

















    <?php
// $menu['menu100'] = array (
//     array('100000', '환경설정', G5_ADMIN_URL.'/config_form.php',   'config'),
//     array('', '기본환경설정', G5_ADMIN_URL.'/config_form.php',   'cf_basic'),
//     array('', '관리권한설정', G5_ADMIN_URL.'/auth_list.php',     'cf_auth'),
//     array('', '테마설정', G5_ADMIN_URL.'/theme.php',     'cf_theme', 1),
//     array('', '메뉴설정', G5_ADMIN_URL.'/menu_list.php',     'cf_menu', 1),
//     array('100300', '메일 테스트', G5_ADMIN_URL.'/sendmail_test.php', 'cf_mailtest'),
//     array('100310', '팝업레이어관리', G5_ADMIN_URL.'/newwinlist.php', 'scf_poplayer'),
//     array('100800', '세션파일 일괄삭제',G5_ADMIN_URL.'/session_file_delete.php', 'cf_session', 1),
//     array('100900', '캐시파일 일괄삭제',G5_ADMIN_URL.'/cache_file_delete.php',   'cf_cache', 1),
//     array('100910', '캡챠파일 일괄삭제',G5_ADMIN_URL.'/captcha_file_delete.php',   'cf_captcha', 1),
//     array('100920', '썸네일파일 일괄삭제',G5_ADMIN_URL.'/thumbnail_file_delete.php',   'cf_thumbnail', 1),
//     array('100500', 'phpinfo()',        G5_ADMIN_URL.'/phpinfo.php',       'cf_phpinfo')
// );

// if(version_compare(phpversion(), '5.3.0', '>=') && defined('G5_BROWSCAP_USE') && G5_BROWSCAP_USE) {
//     $menu['menu100'][] = array('100510', 'Browscap 업데이트', G5_ADMIN_URL.'/browscap.php', 'cf_browscap');
//     $menu['menu100'][] = array('100520', '접속로그 변환', G5_ADMIN_URL.'/browscap_convert.php', 'cf_visit_cnvrt');
// }

// $menu['menu100'][] = array('100400', '부가서비스', G5_ADMIN_URL.'/service.php', 'cf_service');

// $menu['menu200'] = array (
//     array('200000', '회원관리', G5_ADMIN_URL.'/member_list.php', 'member'),
//     array('200100', '회원관리', G5_ADMIN_URL.'/member_list.php', 'mb_list'),
//     array('200300', '회원메일발송', G5_ADMIN_URL.'/mail_list.php', 'mb_mail'),
//     array('200800', '접속자집계', G5_ADMIN_URL.'/visit_list.php', 'mb_visit', 1),
//     array('200810', '접속자검색', G5_ADMIN_URL.'/visit_search.php', 'mb_search', 1),
//     array('200820', '접속자로그삭제', G5_ADMIN_URL.'/visit_delete.php', 'mb_delete', 1),
//     array('200200', '포인트관리', G5_ADMIN_URL.'/point_list.php', 'mb_point'),
//     array('200900', '투표관리', G5_ADMIN_URL.'/poll_list.php', 'mb_poll'),
//     array('200950', '매장관리', G5_ADMIN_URL.'/store_list.php', 'mb_store')
// );

// $menu['menu300'] = array (
//     array('300000', '게시판관리', ''.G5_ADMIN_URL.'/board_list.php', 'board'),
//     array('300100', '게시판관리', ''.G5_ADMIN_URL.'/board_list.php', 'bbs_board'),
//     array('300200', '게시판그룹관리', ''.G5_ADMIN_URL.'/boardgroup_list.php', 'bbs_group'),
//     array('300300', '인기검색어관리', ''.G5_ADMIN_URL.'/popular_list.php', 'bbs_poplist', 1),
//     array('300400', '인기검색어순위', ''.G5_ADMIN_URL.'/popular_rank.php', 'bbs_poprank', 1),
//     array('300500', '1:1문의설정', ''.G5_ADMIN_URL.'/qa_config.php', 'qa'),
//     array('300600', '내용관리', G5_ADMIN_URL.'/contentlist.php', 'scf_contents', 1),
//     array('300700', 'FAQ관리', G5_ADMIN_URL.'/faqmasterlist.php', 'scf_faq', 1),
//     array('300820', '글,댓글 현황', G5_ADMIN_URL.'/write_count.php', 'scf_write_count'),
// );

// $menu['menu400'] = array (
//     array('400000', '상품/상담관리', ''.G5_ADMIN_URL.'/qna/list.php', 'board'),
//     array('400300', '상품 관리', ''.G5_ADMIN_URL.'/product/list.php', 'bbs_board'),
//     array('400100', '창업 상담', ''.G5_ADMIN_URL.'/qna/list.php', 'bbs_board'),
//     array('400200', '문자 상담', ''.G5_ADMIN_URL.'/qna/request.php', 'sms_write')
// );

// $menu["menu900"] = array (
//     array('900000', 'SMS 발송결과', ''.G5_SMS5_ADMIN_URL.'/list.php', 'sms5'),
//     array('900100', '건별 전송내역', ''.G5_SMS5_ADMIN_URL.'/list.php', 'sms_history' , 1),
//     array('900200', '일별 전송결과', ''.G5_SMS5_ADMIN_URL.'/daily.php', 'sms_history' , 1),
//     array('900000', 'SMS 관리', ''.G5_SMS5_ADMIN_URL.'/config.php', 'sms5'),
//     array('900100', 'SMS 기본설정', ''.G5_SMS5_ADMIN_URL.'/config.php', 'sms5_config'),
//     array('900200', '회원정보업데이트', ''.G5_SMS5_ADMIN_URL.'/member_update.php', 'sms5_mb_update'),
//     array('900300', '문자 보내기', ''.G5_SMS5_ADMIN_URL.'/sms_write.php', 'sms_write'),
//     array('900400', '전송내역-건별', ''.G5_SMS5_ADMIN_URL.'/history_list.php', 'sms_history' , 1),
//     array('900410', '전송내역-번호별', ''.G5_SMS5_ADMIN_URL.'/history_num.php', 'sms_history_num' , 1),
//     array('900500', '이모티콘 그룹', ''.G5_SMS5_ADMIN_URL.'/form_group.php' , 'emoticon_group'),
//     array('900600', '이모티콘 관리', ''.G5_SMS5_ADMIN_URL.'/form_list.php', 'emoticon_list'),
//     array('900700', '휴대폰번호 그룹', ''.G5_SMS5_ADMIN_URL.'/num_group.php' , 'hp_group', 1),
//     array('900800', '휴대폰번호 관리', ''.G5_SMS5_ADMIN_URL.'/num_book.php', 'hp_manage', 1),
//     array('900900', '휴대폰번호 파일', ''.G5_SMS5_ADMIN_URL.'/num_book_file.php' , 'hp_file', 1)
    
// );
    ?>