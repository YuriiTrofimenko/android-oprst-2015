div class=jot-form-wrap
a name=jf[+jot.link.id+]a
h3 class=jot-reply-title[+form.editis=`1`then=`�������� �����������`else=`�������� �����������`+]h3
[+form.errorisnt=`0`then=`
div class=jot-err
[+form.errorselect=`
&-3=�� ��������� ��������� ���� � �� �� ���������. �������� �� ������ ������ �������� ����� ������ ����.
&-2=���� ��������� ���� ���������.
&-1=���� ��������� ��������, ��� ����� ������������ ����� ��������� ���������������.
&1=�� ��������� ��������� ���� � �� �� ���������. �������� �� ������ ������ �������� ����� ������ ����.
&2=�� ����� ������������ �������� ���.
&3=�� ������ ���������� ��������� �� ���� [+jot.postdelay+] ������.
&4=���� ��������� ���� ���������.
&5=[+form.errormsgifempty=`�� �� ��������� ��� ��������� ����`+]
`+]
div
`strip+]
[+form.confirmisnt=`0`then=`
div class=jot-cfm
[+form.confirmselect=`
&1=���� ��������� ������������.
&2=���� ��������� ��������, ��� ����� ������������ ����� ��������� ���������������.
&3=��������� ���������.
`+]
div
`strip+]
form method=post action=[+form.actionesc+]#jf[+jot.link.id+] class=jot-form
	input name=JotForm type=hidden value=[+jot.id+] 
	input name=JotNow type=hidden value=[+jot.seed+] 
	input name=parent type=hidden value=[+form.field.parent+] 
	
	[+form.moderationis=`1`then=`
	div class=jot-info
		b������b [+form.field.createdondate=`%d %b %Y � %H%M`+]br 
		b�����b [+form.field.createdbyuserinfo=`username`ifempty=`[+jot.guestname+]`+]br 
		bIPb [+form.field.secip+]br 
		b������������b [+form.field.publishedselect=`0=���&1=��`+]br 
		[+form.field.publishedongt=`0`then=`
		b���� ����������b [+form.field.publishedondate=`%d %b %Y � %H%M`+]br 
		b�����������b [+form.field.publishedbyuserinfo=`username`ifempty=` - `+]br 
		`+]
		[+form.field.editedongt=`0`then=`
		b���� ���������b [+form.field.editedondate=`%d %b %Y � %H%M`+]br 
		b������������b [+form.field.editedbyuserinfo=`username`ifempty=` -`+]br 
		`+]
	div
	`strip+]
	
	div class=jot-controls
		input tabindex=[+jot.seedmath=`+3`+] name=title type=text size=40 value=[+form.field.titleesc+] placeholder=��������� (�������������) 
	div
	div class=jot-controls
		textarea tabindex=[+jot.seedmath=`+4`+] name=content cols=50 rows=6 placeholder=������� �����������...[+form.field.contentesc+]textarea
	div
	
	[+form.guestis=`1`then=`
	div class=jot-controls
		div class=jot-input-prepend
			span class=jot-add-oni class=jot-icon-userispaninput tabindex=[+jot.seedmath=`+1`+] name=name type=text size=40 value=[+form.field.custom.nameesc+] placeholder=111���� ��� title=���� ��� 
		div
		!--div class=jot-input-prepend
			span class=jot-add-oni class=jot-icon-mailispaninput tabindex=[+jot.seedmath=`+2`+] name=email type=text size=40 value=[+form.field.custom.emailesc+] placeholder=Email (�� �����������) title=Email (�� �����������) 
		div--
	div
	`+]
	
	[+jot.captchais=`1`then=`
	div class=jot-controls
		a href=[+jot.link.currentesc+] onclick=onclick=document.captcha.src=src+'rand='+Math.random(); return false; title=���� ��� �� ��������, ������� ����, 
		����� ������������� �����img src=[(base_url)]managerincludesveriword.phprand=[+jot.seed+] name=captcha class=jot-captcha width=148 height=60 alt= abr 
		label for=vericode-[+jot.link.id+]���label
		input type=text name=vericode id=vericode-[+jot.link.id+] style=width150px size=20 
	div
	`+]
	
	div class=jot-form-actions
		button tabindex=[+jot.seedmath=`+5`+] class=jot-btn jot-btn-submit type=submit[+form.editis=`1`then=`���������`else=`���������`+]button
		[+form.editis=`1`then=`
		button tabindex=[+jot.seedmath=`+6`+] class=jot-btn jot-btn-cancel onclick=history.go(-1);return false;������button
		`+]
	div
form
div