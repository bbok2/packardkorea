<?php
$mmenu = 5;
$smenu = 3;
include '../inc/header.php';
?>

<div id="content_wrap" class="apply">
	<div class="sub_content">
		<div class="sec01">
			<div class="inner">
				<h3>지원서 작성 안내</h3>
				<div class="tbstyle01">
					<table>
						<caption>채용에관한 전형절차, 구분, 내용에 대한 정보를 제공하는 표</caption>
						<colgroup>
							<col width="20%">
							<col width="15%">
							<col width=""></colgroup>
						<thead>
							<tr>
								<th>전형절차</th>
								<th>구분</th>
								<th>내용</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th rowspan="4">지원사항</th>
								<th>전형구분</th>
								<td>신입, 경력 중 선택</td>
							</tr>
							<tr>
								<th>지원분야</th>
								<td>모집분야 참고</td>
							</tr>
							<tr>
								<th>희망근무지</th>
								<td>모집분야 / 근무지 참고</td>
							</tr>
							<tr>
								<th>희망여봉</th>
								<td>희망연봉을 기재 <strong>(회사규정에 따를 경우도 희망연봉기재)</strong></td>
							</tr>
							<tr>
								<th rowspan="9">인적사항</th>
								<th>사진</th>
								<td>3 * 4cm 규격의 최근(<strong>3개월이내</strong>의 사진 사용(<strong>필수</strong>))</td>
							</tr>
							<tr>
								<th>성명</th>
								<td>한글,한자,영문 작성 예를 참고하여 기재</td>
							</tr>
							<tr>
								<th>주소</th>
								<td>
									우편검색을 이용하면 우편번호에 해당하는 주소가 자동입력<br>
									상세주소는 직접입력 (번지,호수,층수 등)
								</td>
							</tr>
							<tr>
								<th>연락처</th>
								<td>전화통화 가능한 연락처 기재(집,휴대전화)</td>
							</tr>
							<tr>
								<th>보훈번호</th>
								<td>모를경우 지방 보훈청에 문의하여 기재 후 면접시 증빙서류 제출</td>
							</tr>
							<tr>
								<th>관계</th>
								<td>보훈대상자와의 관계 설명 (예 : 본인,손...)</td>
							</tr>
							<tr>
								<th>장애종류</th>
								<td>지체,청각,언어 장애 등 장애 유형 기재</td>
							</tr>
							<tr>
								<th>장애급수</th>
								<td>
									<strong>해당 급수 기재</strong><br>
									(예 : 지체장애 6급)
								</td>
							</tr>
							<tr>
								<th>E-Mail</th>
								<td><strong>합격통보 등 아낸 메일을 받을 수 있는 연락처 필히 기재</strong></td>
							</tr>
							<tr>
								<th rowspan="4">병역사항</th>
								<th>면제사유</th>
								<td>군 면제, 미필 사유 기재(예 : 국가유공자녀)</td>
							</tr>
							<tr>
								<th>병역구분</th>
								<td>육군,해군,공군... 중 선택</td>
							</tr>
							<tr>
								<th>계급</th>
								<td>선택화면에서 본인의 최종 계급 선택</td>
							</tr>
							<tr>
								<th>복무기간</th>
								<td>군무 년/월 선택</td>
							</tr>
							<tr>
								<th rowspan="4">학력사항</th>
								<th>전공</th>
								<td>고등학교의 경우 "계열"선택 / 전문대학 이상의 경우(<strong>복수</strong>) 전공 기재</td>
							</tr>
							<tr>
								<th>성적</th>
								<td>고등학교의 경우 "고교내신등급"선택 / 소수점 아래 2자리까지 기재</td>
							</tr>
							<tr>
								<th>소재지</th>
								<td>학교 소재지가 속한 "시 이름" 기재 (천안,서울,대전,대구...)</td>
							</tr>
							<tr>
								<th>구분</th>
								<td>졸업여부 선택</td>
							</tr>
							<tr>
								<th rowspan="5">외국어사항</th>
								<th>외국어명</th>
								<td>공인 인증 시험</td>
							</tr>
							<tr>
								<th>Test명</th>
								<td>해당 외국어의 시험명 기재</td>
							</tr>
							<tr>
								<th>점수</th>
								<td>취득점수 기재</td>
							</tr>
							<tr>
								<th>취득년도</th>
								<td>최근 만 2년 이내의 취득년도만 기재</td>
							</tr>
							<tr>
								<th>회화수준</th>
								<td>상,중,하 선택</td>
							</tr>
							<tr>
								<th rowspan="4">연수/사회 봉사활동</th>
								<th>구분</th>
								<td>국내,국외 선택</td>
							</tr>
							<tr>
								<th>장소</th>
								<td>연수장소를 구체적으로 기재</td>
							</tr>
							<tr>
								<th>내용</th>
								<td>연수의 주된 내용을 기술</td>
							</tr>
							<tr>
								<th>기간</th>
								<td>연수기간 선택</td>
							</tr>
							<tr>
								<th rowspan="4">경력사항</th>
								<th>직장명</th>
								<td>단기간/단시간 근로를 제외한 정식입사 전형을 거쳐 취업한 장소</td>
							</tr>
							<tr>
								<th>최종직위</th>
								<td>퇴사시 직위(사원,대리,과장,차장...)</td>
							</tr>
							<tr>
								<th>담당업무</th>
								<td>전 근무지의 주된 업무를 요약기재(생산관리,품질관리,인사관리...)</td>
							</tr>
							<tr>
								<th>연봉수준</th>
								<td>전 근무지의 연봉수준 기재</td>
							</tr>
							<tr>
								<th rowspan="3">자기소개서</th>
								<th>성장과정</th>
								<td>성장과정, 남 다른 과정, 성격의 장 단점등 자유롭게 기술</td>
							</tr>
							<tr>
								<th>지원동기</th>
								<td>지원하는 직무의 경험, 적합성, 입사 후 포부 등 구체적으로 기재</td>
							</tr>
							<tr>
								<th>자기 PR</th>
								<td>지원서 상에 기재 하지 못한 내용 및 남과의 차별성, 전문성 등 기재</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>	
	</div>	
</div>
<?php include '../inc/footer.php';?>

