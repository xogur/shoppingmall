<style>
.submit{
		background:#57A621;
		color: white;
		border-radius:5px;
		width:350px;
		height:50px;
		font-size:30px;
		}
		.submit:hover {border-radius:50px;
				color:white;
		background-color:#2D6F01;
		}
input[type=text] { 
      border: none;
	  background: lightgray;
      /*�⺻���� ������ �ִ� �����׵θ��� ����*/ 
      border-bottom: 1px solid black; 
      /*���ο� �׵θ��� �غκи� ���� (���β�, �����, ������)*/
      background: none; 
      /*�⺻���� ������ �ִ� ������ ����*/
      font: 14px;
	  
      /* �۾��� ����� �ٲ� (ũ��, ��Ʈ����)*/
	  }
input[type=password] { 
      border: none;
	  background: lightgray;
      /*�⺻���� ������ �ִ� �����׵θ��� ����*/ 
      border-bottom: 1px solid black; 
      /*���ο� �׵θ��� �غκи� ���� (���β�, �����, ������)*/
      background: none; 
      /*�⺻���� ������ �ִ� ������ ����*/
      font: 14px;
	  
      /* �۾��� ����� �ٲ� (ũ��, ��Ʈ����)*/
	  }
</style>
<? include ("top.php");?>
<center>

<tr><td>
<form method=post action=login-pass.php onsubmit="if(!this.uid.value || !this.upass.value) return false;">
<table border=0 width=500 style="padding-left:80px; padding-top:200px;">
        <tr><td align=right height=70><br>���̵� </td><td><br><input type=text style="margin-left:30px; height:30px;" placeholder="���̵� �Է����ּ���." size=25 name=uid></td></tr>
<tr><td align=right height=70>��й�ȣ </td><td><input type=password style="margin-left:30px; height:30px;" placeholder="��й�ȣ�� �Է����ּ���" size=25 name=upass></td></tr>
<tr><td colspan=2 align=center style="padding-right:80px;"><input type=submit value=�α��� class='submit' style="border:none;"></td></tr>
</form>
</table>
</td></tr>


<table width=170 cellspacing=0 cellpadding=0 border=0 align=center style="padding-top:10px; padding-bottom:200px;">
<tr><td align=center><a href="member.php" style="color:#7DC90B; text-decoration:none;">ȸ�����</a>&nbsp;&nbsp;<a href=findidpw.php style="color:#767676; text-decoration:none;">����н�</a></td></tr>
</table>
<center>
<? include ("bot.php");?>"bot.php");?>