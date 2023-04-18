const controllerUrl = "./../controller/controller.php";

$(function () {
  // get all data with ajax
  $.ajax({
    type: "GET",
    url: controllerUrl,
    async: false,
    cache: false,
    data: {
      opt: "read_All",
    },
    success: function (data) {
      data = JSON.parse(data);
      // display data
      displayTableRows(data);
      bindEventsToIcon();
    },

    beforeSend: function () {
      // console.log("loading...");
    },

    error: function (xhr, status, error) {
      console.log("Error in ajax request : " + error);
    },
  });

  // add user submission
  $("#addUserForm").submit(function (e) {
    e.preventDefault();

    let email = $("#add_Input_Email").val();
    let password = $("#add_Input_Password").val();
    let name = $("#add_Input_Name").val();
    let surname = $("#add_Input_Surname").val();

    let data = {
      opt: "create_User",
      email: email,
      password: password,
      name: name,
      surname: surname,
    };

    $.ajax({
      type: "POST",
      url: controllerUrl,
      async: false,
      cache: false,
      data: data,
      success: function (data) {
        if (data === false) console.log("cannot add");
        else {
          data = JSON.parse(data); // id
          console.log("added successfully.");

          let output = `
            <tr>
                <th scope="row">${data}</th>
                <td>${email}</td>
                <td>${name}</td>
                <td>${surname}</td>
                <td>
                    <i class="bi bi-pencil ms-2 opacity-75 updateIcon id-${data}"></i>
                    <i class="bi bi-trash ms-2 opacity-75 deleteIcon id-${data}"></i>
                    <i class="bi bi-eye ms-2 opacity-75 displayIcon id-${data}" data-bs-toggle="modal" data-bs-target="#userModal"></i>
                </td>
            </tr>
        `;

          $("tbody").append(output);
        }
      },

      beforeSend: function () {
        // console.log("loading...");
      },

      error: function (xhr, status, error) {
        console.log("Error in ajax request : " + error);
      },
    });

    // $(this).unbind("submit").submit();
  });
});

function bindEventsToIcon() {
  // view specific user icon click event
  $(document).on("click", ".displayIcon", function () {
    // extract id from class list
    let id = extractId(this);

    // get specific id with ajax
    $.ajax({
      type: "POST",
      url: controllerUrl,
      async: false,
      cache: false,
      data: {
        opt: "read_Specific",
        id: id,
      },
      success: function (data) {
        data = JSON.parse(data);

        // change modal body
        $(".modal-body").html(data.name);
      },

      beforeSend: function () {
        // console.log("loading...");
      },

      error: function (xhr, status, error) {
        console.log("Error in ajax request : " + error);
      },
    });
  });

  // delete event
  $(document).on("click", ".deleteIcon", function () {
    // extract id from class list
    let id = extractId(this);
    let element = $(this);
    console.log(element.parent().parent().remove());

    // delete with ajax
    $.ajax({
      type: "GET",
      url: controllerUrl,
      async: false,
      cache: false,
      data: {
        opt: "delete_User",
        id: id,
      },
      success: function (data) {
        if (data) {
          console.log("deleted successfully.");
        }
      },

      beforeSend: function () {
        // console.log("loading...");
      },

      error: function (xhr, status, error) {
        console.log("Error in ajax request : " + error);
      },
    });
  });
}

function displayTableRows(data) {
  let output;

  data.forEach((row) => {
    output += `
            <tr>
                <th scope="row">${row.Id}</th>
                <td>${row.Email}</td>
                <td>${row.Name}</td>
                <td>${row.Surname}</td>
                <td>
                    <i class="bi bi-pencil ms-2 opacity-75 updateIcon id-${row.Id}"></i>
                    <i class="bi bi-trash ms-2 opacity-75 deleteIcon id-${row.Id}"></i>
                    <i class="bi bi-eye ms-2 opacity-75 displayIcon id-${row.Id}" data-bs-toggle="modal" data-bs-target="#userModal"></i>
                </td>
            </tr>
        `;
  });
  $("tbody").append(output);
}

function extractId(element) {
  let classes = $(element).attr("class").split(" ");
  let id;

  classes.forEach((cls) => {
    if (cls.includes("id")) id = cls.split("-")[1];
  });

  return id;
}
