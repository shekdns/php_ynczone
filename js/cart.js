function cart_input()
{
  if (!document.view_form.pro_size.value)
  {
      alert("사이즈를 선택해주세요");
      document.view_form.pro_size.focus();
      return;
  }

    document.view_form.submit();
}
