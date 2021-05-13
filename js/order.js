function order_input()
{
    if (!document.order_form.oname.value)
    {
        alert("받으시는분을 적으세요");
        document.order_form.oname.focus();
        return;
    }

    if (!document.order_form.zip.value)
    {
        alert("우편번호를 입력하세요.");
        document.order_form.zip.focus();
        return;
    }
    if (!document.order_form.addr2.value)
    {
        alert("상세주소를 입력하세요.");
        document.order_form.addr2.focus();
        return;
    }
    if (!document.order_form.phone1.value || !document.order_form.phone2.value || !document.order_form.phone3.value)
    {
        alert("휴대폰번호를 입력하세요.");
        document.order_form.phone1.focus();
        return;
    }
    if (!document.order_form.email.value)
    {
        alert("이메일을 입력하세요.");
        document.order_form.email.focus();
        return;
    }


    document.order_form.submit();
}
