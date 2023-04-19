const controllerUrl = "./assets/controller/ajax_Controller.php";

$(function () {
  // login submission with ajax
  $("#login_Form").submit(function (e) {
    e.preventDefault();

    let email = $("#login_Input_Email").val();
    let password = $("#login_Input_Password").val();
    let remember = $("#login_Remember").prop("checked");

    let data = {
      opt: "perform_Login_Operation",
      email: email,
      password: password,
      remember: remember,
    };
    $.post(controllerUrl, data).then(function (data) {
      if (data == true) window.location.href = "./assets/views/main.php";
    });

    // $(this).unbind("submit").submit();
  });
});
