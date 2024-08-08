$(document).ready(function () {
  $(document).on("click", "#generate-code-btn", function (e) {
    e.preventDefault();
    let randomCode = generateRandomCode(8);
    $("#discount-code-input").val(randomCode);
  });

  function generateRandomCode(length) {
    let result = "";
    let characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    let charactersLength = characters.length;
    for (let i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }
  $(".predefined_list_discount").select2();
});
$(document).ready(function () {
  // Initialize select2
  $(".accessory_discount").select2();
  $(".predefined_list_discount").select2();

  // Generate random code
  $(document).on("click", "#generate-code-btn", function (e) {
    e.preventDefault();
    let randomCode = generateRandomCode(8);
    $("#discount-code-input").val(randomCode);
  });

  function generateRandomCode(length) {
    let result = "";
    let characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    let charactersLength = characters.length;
    for (let i = 0; i < length; i++) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }

  // Boat selection change event
  $("#boat-select").change(function () {
    var selectedBoats = $(this).val();
    var $accessoryContainer = $("#accessory-container");
    var $accessorySelect = $("#accessory-select");

    if (selectedBoats.length > 0) {
      $accessoryContainer.show(); // Show accessory container
      $accessorySelect.empty();
      $accessorySelect.append('<option value="">Select an accessory</option>');

      $.ajax({
        url: route("custom-boat-discounts.get-accessories"),
        type: "POST",
        data: {
          boats: selectedBoats,
          _token: $('meta[name="csrf-token"]').attr("content"), // Add CSRF token for security
        },
        success: function (response) {
          if (response.success) {
            var accessories = response.accessories;

            accessories.forEach(function (category) {
              $accessorySelect.append(
                "<option disabled>" + category.ltitle + "</option>"
              );
              category.sub_categories.forEach(function (subCategory) {
                $accessorySelect.append(
                  "<option disabled>&nbsp;&nbsp;" +
                    subCategory.ltitle +
                    "</option>"
                );
                subCategory.sub_sub_categories.forEach(function (
                  subSubCategory
                ) {
                  $accessorySelect.append(
                    '<option value="' +
                      subSubCategory.id +
                      '">&nbsp;&nbsp;&nbsp;&nbsp;' +
                      subSubCategory.ltitle +
                      "</option>"
                  );
                });
              });
            });

            $accessorySelect.trigger("change"); // Refresh the select2 dropdown
          } else {
            alert(response.message); // Display error message
          }
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error: ", status, error);
        },
      });
    } else {
      $accessoryContainer.hide(); // Hide accessory container
    }
  });
});
