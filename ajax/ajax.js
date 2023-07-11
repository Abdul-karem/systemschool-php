$(document).on('click', '#btn-add', function (e) {
    e.preventDefault();
    var data = $("#user_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "save.php",
        success: function (dataResult) {
            try {
                var response = JSON.parse(dataResult);
                if (response.statusCode == 200) {
                    $('#addEmployeeModal').modal('hide');
                    alert('Data added successfully!');
                    location.reload();
                } else if (response.statusCode == 500) {
                    alert(response.message);
                }
            } catch (e) {
                alert("Error: Invalid response from the server.");
            }
        },
        error: function () {
            alert("Error: Failed to communicate with the server.");
        }
    });
});

$(document).on('click', '.update', function (e) {
    e.preventDefault();
    var id = $(this).attr("data-id");
    var name = $(this).attr("data-name");
    var email = $(this).attr("data-email");
    var password = $(this).attr("data-password");
    $('#id_u').val(id);
    $('#name_u').val(name);
    $('#email_u').val(email);
    $('#phone_u').val(password);
});

$(document).on('click', '#update', function (e) {
    e.preventDefault();
    var data = $("#update_form").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "save.php",
        success: function (dataResult) {
            try {
                var response = JSON.parse(dataResult);
                if (response.statusCode == 200) {
                    $('#editEmployeeModal').modal('hide');
                    alert('Data updated successfully!');
                    location.reload();
                } else if (response.statusCode == 500) {
                    alert(response.message);
                }
            } catch (e) {
                alert("Error: Invalid response from the server.");
            }
        },
        error: function () {
            alert("Error: Failed to communicate with the server.");
        }
    });
});

$(document).on("click", ".delete", function () {
    var id = $(this).attr("data-id");
    $('#id_d').val(id);
});

$(document).on("click", "#delete", function () {
    $.ajax({
        url: "save.php",
        type: "POST",
        cache: false,
        data: {
            type: 3,
            id: $("#id_d").val()
        },
        success: function (dataResult) {
            try {
                var response = JSON.parse(dataResult);
                if (response.statusCode == 200) {
                    $('#deleteEmployeeModal').modal('hide');
                    $("#" + response.id).remove();
                } else if (response.statusCode == 500) {
                    alert(response.message);
                }
            } catch (e) {
                alert("Error: Invalid response from the server.");
            }
        },
        error: function () {
            alert("Error: Failed to communicate with the server.");
        }
    });
});

$(document).on("click", "#delete_multiple", function () {
    var user = [];
    $(".user_checkbox:checked").each(function () {
        user.push($(this).data('user-id'));
    });
    if (user.length <= 0) {
        alert("Please select records.");
    } else {
        var WRN_PROFILE_DELETE = "Are you sure you want to delete " + (user.length > 1 ? "these" : "this") + " row?";
        var checked = confirm(WRN_PROFILE_DELETE);
        if (checked) {
            var selected_values = user.join(",");
            $.ajax({
                type: "POST",
                url: "save.php",
                cache: false,
                data: {
                    type: 4,
                    id: selected_values
                },
                success: function (dataResult) {
                    try {
                        var response = JSON.parse(dataResult);
                        if (response.statusCode == 200) {
                            var ids = response.ids;
                            for (var i = 0; i < ids.length; i++) {
                                $("#" + ids[i]).remove();
                            }
                        } else if (response.statusCode == 500) {
                            alert(response.message);
                        }
                    } catch (e) {
                        alert("Error: Invalid response from the server.");
                    }
                },
                error: function () {
                    alert("Error: Failed to communicate with the server.");
                }
            });
        }
    }
});

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function () {
        checkbox.prop("checked", this.checked);
    });

    checkbox.click(function () {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });
});
