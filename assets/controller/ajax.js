// -----------------------------------------------------------
$("button").click(function () {
  // let url = "sendData.php";
  let url = "http://localhost/AhmetOguzErgin/Web/mySolutions/11/1/dataSend.php";

  let data = { name: "ahmet", age: 24 };
  $.get(url, data, function (data) {
    console.log(data);
  }).then(function (data) {
    console.log(data);
  });
});

// OR -----------------------------------------------------------

$("button").click(function () {
  // let url = "sendData.php";
  let url = "http://localhost/AhmetOguzErgin/Web/mySolutions/11/1/dataSend.php";

  $.ajax({
    type: "GET",
    url: url,
    async: false,
    data: {
      name: "ahmet",
      age: 24,
    },
    success: function (data) {
      console.log("Data recieved.");
      console.log(data);
      console.log(JSON.stringify(data));
    },

    cache: false,
    beforeSend: function () {
      console.log("loading...");
    },
    error: function (xhr, status, error) {
      console.log("Error in ajax request : " + error);
    },
  });
});

// -----------------------------------------------------------
