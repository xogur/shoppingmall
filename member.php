<script   language='Javascript'>
function   id_check() {
var id = document.comma.uid.value;
if (id.length < 5) {
	window.alert('ID는 5글자 이상 입력해주세요');
} else {
	window.open('id_check.php?id=' + id, 'IDCHECK', 'width=450, height=180, scrollbars=yes');
}
}

function   go_zip() {
window.open('zipcode.php','ZIP','width=470, height=180, scrollbars=yes');
}
</script>
<style>
.submit{
		background:#57A621;
		color: white;
		border-radius:50px;
		width:200px;
		height:70px;
		font-size:30px;
		}
		.submit:hover {border-radius:50px;
				color:white;
		background-color:#2D6F01;}
	input[type=text] { 
      border: none;
	  background: lightgray;
      /*기본으로 가지고 있던 검정테두리를 없앰*/ 
      border-bottom: 1px solid lightgray; 
      /*새로운 테두리를 밑부분만 생성 (선두께, 선모양, 선색깔)*/
      background: none; 
      /*기본으로 가지고 있던 배경색를 없앰*/
      font: 14px;
	  
      /* 글씨의 모양을 바꿈 (크기, 폰트종류)*/
	  }
	input[type=password] { 
      border: none;
	  background: lightgray;
      /*기본으로 가지고 있던 검정테두리를 없앰*/ 
      border-bottom: 1px solid lightgray; 
      /*새로운 테두리를 밑부분만 생성 (선두께, 선모양, 선색깔)*/
      background: none; 
      /*기본으로 가지고 있던 배경색를 없앰*/
      font: 14px;
	  
      /* 글씨의 모양을 바꿈 (크기, 폰트종류)*/
	  }
</style>
<? include ("top.php");?>
<?
echo ("<center>
<form action=register.php method=post name=comma>
	<table border=0 width=1200 height=500 style='margin-top:120px; border-collapse:collapse;'>

		<tr><td align=left height=50 style='border-bottom:2px solid gray; font-size:30px;' colspan=2 valign=bottom>■회원정보입력</td></tr>
		<tr><td style='border-bottom:1px solid lightgray;' align=center width=200 height=50>이름</td>
			<td style='border-bottom:1px solid lightgray;'><input type=text size=10 name=uname></td></tr>
		<tr><td style='border-bottom:1px solid lightgray;' width=200 height=50 align=center>아이디(필수)</td>
			<td style='border-bottom:1px solid lightgray;'><input type=text size=10 name=uid><font size=2>[<a   href='javascript:id_check()'>ID중복검사</a>]</font></td></tr>
		<tr><td style='border-bottom:1px solid lightgray;' align=center width=200 height=50>비밀번호(필수)</td>
			<td style='border-bottom:1px solid lightgray;'><input type=password maxlength=15 name=upass1></td></tr>
		<tr><td style='border-bottom:1px solid lightgray;' align=center width=200 height=50>비밀번호 확인(필수)</td>
			<td style='border-bottom:1px solid lightgray;'><input type=password   maxlength=15 style='height:20;' size=20 name=upass2></td></tr>
		<tr><td style='border-bottom:1px solid lightgray;' align=center width=200 height=200>주소</td>
			<td style='border-bottom:1px solid lightgray;'><input type=text size=7   name=zip readonly=readonly><font size=2>[<a   href='javascript:go_zip()'>우편번호검색</a>]</font><br><input type=text size=35 name=addr1 readonly=readonly><br><input   type=text size=35 name=addr2></td></tr>
		<tr><td style='border-bottom:1px solid lightgray;' align=center width=200 height=50>E-mail</td>
			<td style='border-bottom:1px solid lightgray;'><input type=text size=30 name=email></td></tr>
		<tr style='border-bottom:1px solid lightgray;'><td style='border-bottom:2px solid gray;' align=center width=200 height=50>전화번호</td>
			<td style='border-bottom:2px solid gray;'><input type=text size=20 name=mphone></td></tr>
		</table>
		
		
		<table border=0 width=1200 height=800 style='margin-top:100px; border-collapse:collapse;'>
		<tr><td style='border-bottom:2px solid gray; font-size:30px;'>■회원가입 약관동의</td></tr>
		<tr><td style='border-bottom:1px solid lightgray;'><div style='overflow:scroll; width:1000px; height:300px; margin-left:100px;'>배추도사 무도사 이용약관
		<br>제1장 총칙<br>
		<br>제1조 (목적)<br>
		<br>본 약관은 (주)초록마을(이하 '당사'라 함)이 제공하는 멤버십 서비스(이하 “초록마을 멤버스'라 함) 이용과 관련하여 당사와 회원의 제반 권리, 의무, 관련 절차 등을 규정하는데 그 목적이 있습니다.

<br><br>제2조 (용어의 정의)<br>
<br>본 약관에서 사용하는 주요 용어의 정의는 다음과 같습니다.<br>

<br>1.“초록마을 멤버스” 회원(이하 '회원'이라 함)이란 당사의 홈페이지를 통해 본 약관 제5조에 정해진 가입 절차에 따라 가입하여 정상적으로 “초록마을 멤버스” 서비스를 이용할 수 있는 권한을 부여 받은 고객을 말합니다.
<br>2.“초록마을 멤버스” 카드(이하 '카드' 또는 문맥에 따라 '멤버십 카드'라 함)란 당사가 회원에게 발급하여 “초록마을 멤버스” 서비스를 정상적으로 이용하도록 사용 승인한 바코드 형태의 카드 (모바일 카드 포함)로 당사와 제휴영업점에서 포인트 적립 및 사용이 가능한 카드를 말합니다.
<br>3.“초록마을 멤버스” 서비스(이하 “초록마을 멤버스 서비스”라 함)란 당사와 제휴가맹점이 회원에게 제공하는 포인트 적립, 사용, 할인, 이벤트 참여 등의 전반적인 고객 서비스 프로그램을 말합니다.
<br>4.포인트(이하 '포인트'라 함)란 당사와 제휴영업점에서 재화 또는 서비스 구매 시 적립?사용이 가능하도록 제공하는 포인트를 말합니다.
<br>5.“초록마을 멤버스” 홈페이지(이하 '서비스홈페이지'라 함)라 함은 회원이 온라인을 통해 “초록마을 멤버스” 서비스를 이용할 수 있는 당사의 인터넷 사이트를 말합니다.
<br>6.당사가 “초록마을 멤버스” 서비스를 제공하는 매체는 당사가 직접 운영하는 브랜드의 매장 및 인터넷 쇼핑몰을 말합니다.
<br>7.제휴영업점이란 “초록마을 멤버스” 서비스를 제공하기 위해 당사와 계약하여 “초록마을 멤버스” 서비스를 제공하는 자 또는, 당사와 가맹계약을 체결하고 당사 상호 및 상표를 사용하여 “초록마을 멤버스” 서비스를 공동으로 운영하기로 합의한 매장 또는 업소를 말합니다(단, 일부 매장은 제외될 수 있음). 추후 제휴영업점은 당사 및 제휴영업점의 사정에 따라 추가 또는 서비스 계약 해지될 수 있으며 구체적인 제휴영업점의 내역은 당사 “초록마을 멤버스” 홈페이지에서 확인 가능합니다.
<br>8.기존 멤버십 회원(이하 “기존 멤버십 회원”이라 함)이란 당사에서 “초록마을 멤버스” 서비스 이전 초록마을 매장 회원 및 온라인 회원을 말합니다.
<br><br>제3조 (약관의 효력 및 개정)<br>
<br>1.본 약관의 내용은 당사의 서비스홈페이지 화면에 게시하거나 기타의 방법으로 회원에게 공지하고, 이에 동의한 회원이 “초록마을 멤버스” 서비스에 가입함으로써 효력이 발생합니다.
<br>2.본 약관은 “초록마을 멤버스” 서비스에 가입된 회원을 포함하여 서비스를 이용하고자 하는 모든 회원에 대하여 그 효력이 발생합니다.
<br>3.본 약관은 수시로 개정 가능하며 약관을 개정하고자 할 경우 당사는 개정된 약관을 적용하고자 하는 날로부터 7일 이전에 약관이 개정된다는 사실과 개정된 내용 등을 아래 규정된 방법 중 1가지 이상의 방법으로 회원에게 통지합니다. 다만, 회원에게 불리하게 약관내용이 변경되는 경우에는 최소한 30일 이상의 사전 유예기간을 두고 고지합니다.
<br>- e-mail 통보
<br>- 서비스홈페이지(members.choroc.com)내 고지
<br>- 서면 통보 또는 전단고지
<br>- 제휴영업점 내 게시
<br>- 기타 회원 가입 시, 회원이 제공한 연락처 정보 등을 이용한 전화 안내 등의 방법
<br>4.당사가 영업양도 등의 방법으로 본 약관에 따른 계약관계를 이전하고자 하는 경우, 그 사실을 회원에게 개별적으로 통지하고 회원이 이에 대하여 30일간 이의를 제기하지 않고 계속해서 “초록마을 멤버스” 서비스를 이용하는 경우에는 이에 대하여 동의한 것으로 봅니다.
<br>5.당사가 e-mail 통보 또는 서면 통보의 방법으로 본 약관이 개정된 사실 및 개정된 내용을 회원에게 고지하는 경우에는 회원이 제공한 정보 중 가장 최근에 제공된 정보를 기준으로 통보하며 이 경우, 당사가 적법한 통보를 완료한 것으로 봅니다.
<br>6.본 규정에 의하여 개정된 약관은 원칙적으로 그 효력 발생일로부터 장래를 향하여 유효합니다.
<br>7.본 약관의 개정과 관련하여 이의가 있는 회원은 회원탈퇴를 할 수 있으며 개정 된 약관의 효력발생일까지 탈퇴하지 않거나 별도로 당사에 이의를 제기하지 않는 경우 변경된 약관에 동의한 것으로 봅니다.
<br>8.본 규정의 통지방법 및 통지의 효력은 본 약관의 각 조항에서 규정하는 개별적인 또는 전체적인 통지의 경우에 이를 준용합니다.
<br><br>제4조 (“초록마을 멤버스” 서비스 개요)<br>
<br>1.당사와 제휴영업점이 본 약관에 정해진 바에 따라 회원에게 제공하는 “초록마을 멤버스” 서비스는 아래와 같습니다.
<br>1)포인트 적립 서비스
<br>회원은 당사와 제휴영업점에서 상품 또는 서비스 구입 시, 이벤트 등에 의해 포인트를 적립 받을 수 있습니다. 단, 당사 및 제휴영업점의 사정에 따라 지정된 일부 상품 또는 일정 기간은 제외 될 수 있으며, 포인트 적립률은 “초록마을 멤버스” 서비스 홈페이지에서 확인 가능합니다.
<br>2)포인트 사용 서비스
<br>회원은 적립된 포인트를 사용하여 당사 또는 제휴영업점에서 제공하는 재화 또는 서비스를 구입할 수 있습니다. 단, 회원이 포인트를 사용하기 위해서는 반드시 카드를 발급 받고 등록을 완료해야 합니다.
<br>3)통합 아이디 서비스
<br>회원은 당사의 서비스홈페이지 ID와 비밀번호를 통합하여 이용할 수 있는 회원 인증 서비스인 통합 아이디 서비스를 이용할 수 있습니다.
<br>4)기타 서비스
<br>당사는 상기 각 호의 서비스 이외에도 추가적인 서비스를 개발하여 회원에게 제공할 수 있으며 자세한 “초록마을 멤버스” 서비스 내용은 당사가 운영하는 “초록마을 멤버스” 홈페이지 (members.choroc.com)를 참조하시기 바랍니다.
<br>2.본 약관 제 5조 ① 항에서 서비스홈페이지를 통해 회원 가입하지 않고 카드만 발급 받은 경우 당사 또는 제휴영업점의 “초록마을 멤버스” 서비스를 원활하게 이용하기 위해서는 당사에서 정하는 별도의 약관에 대한 동의 및 개인정보 처리 방침(‘개인정보 제공 및 활용 동의’ 등) 동의 등 추가 등록절차를 완료 하여야 서비스홈페이지 이용 및 본 조 ①항에 명시된 서비스를 원활히 제공 받을 수 있습니다.
<br>3.회원에게 제공되는 “초록마을 멤버스” 서비스는 당사의 영업정책이나 제휴영업점의 사정에 따라 변경될 수 있습니다.
</div><div><input type='checkbox' name='agree2' value='동의' style='margin-left:1000px; height:20px; width:20px;'></input><font style='margin-left:1025px; position:relative; bottom:25px;'>동의</font></div></td></tr>
<tr><td style='border-bottom:2px solid gray; font-size:30px;'>■개인정보 수집,이용동의</td></tr>
<tr>
	<td ><div style='overflow:scroll; width:1000px; height:300px; margin-left:100px;'>
	가. 개인정보의 수집/이용 목적<br>
<br>전자소송의 서비스 제공을 위한 계약의 성립(본인식별 및 본인의사 확인 등)과 그 이행(전자소송에 관한 정보의 제공과 이용 등)을
<br>위한 자료로 활용하기 위하여 귀하의 개인정보를 수집 및 이용하고 있습니다.
<br>나. 수집하려는 개인정보의 항목
<br>- 필수항목 : 아이디, 고유식별정보(주민등록번호, 외국인등록번호, 여권번호). 재외국민등록번호, 사업자등록번호, 국적, 성명,
<br>주소, 휴대전화번호, 전자우편주소(이메일)
<br>- 선택항목 : 송달장소, 보조이메일, 환급계좌정보(은행, 계좌번호, 예금주)
<br>※ 단, 고유식별번호(주민등록번호, 외국인등록번호, 여권번호)에 대하여는 개인정보 보호법 제15조, 제24조의2 및 민사소송규칙
<br>제76조의2(민감정보 등의 처리), 법원재판사무 처리규칙 제5조의2(민감정보 등의 처리)에 근거하여 수집 및 이용하고 있습니다.
<br>※ 인터넷 서비스 이용과정에서 불량회원의 부정이용 방지를 위해 “IP주소, 방문일시” 개인정보 항목이 자동으로 생성되어 수집될수 있습니다.
<br>다. 개인정보의 보유 및 이용 기간
<br>귀하의 개인정보는 사용자등록을 탈퇴하거나 사용자자격을 상실할 때와 같이 개인정보의 처리 목적 달성 등 그 개인정보가
<br>불필요하게 되었을 때 파기하는 것을 원칙으로 합니다. 다만 사용자등록을 하고 전자사건 또는 전자신청이 있었던 사용자의 경우는영구 보존됩니다.
<br>※ 전자사건 또는 전자신청이 있었던 사용자의 경우 처음 생성된 “아이디”가 영구 보존되어, 추후에 변경 및 삭제가 불가능하오니
<br>“아이디”를 반드시 기억해 주시기 바랍니다.
<br>라. 동의를 거부할 권리가 있다는 사실과 동의 거부에 따른 불이익 내용
<br>귀하는 개인정보의 수집·이용에 동의하지 않으실 수 있습니다. 다만 동의 거부 시에는 대한민국 법원 전자소송 홈페이지
<br>사용자등록이 불가하며 전자소송 체험하기, 바로가기(이용안내 및 부가기능) 등 제한된 일부 서비스만 이용 가능합니다.
</div>
<div><input type='checkbox' name=agree1 value='동의' style='margin-left:1000px; height:20px; width:20px;'></input><font style='margin-left:1025px; position:relative; bottom:25px;'>동의</font></div></form></center></td></td></tr>

</table>

<input type='submit' value='가입하기' class='submit' style='border:none;'></form>
		");

?>
<?include ("bot.php");?>