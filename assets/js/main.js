const controllerUrl = "./../controller/controller.php";

$(function () {
  // get data with ajax
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
    },

    beforeSend: function () {
      console.log("loading...");
    },

    error: function (xhr, status, error) {
      console.log("Error in ajax request : " + error);
    },
  });
});

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
                    <i class="bi bi-pencil ms-2 updateIcon"></i>
                    <i class="bi bi-trash ms-2 removeIcon"></i>
                </td>
            </tr>
        `;
  });
  $("tbody").append(output);
}
