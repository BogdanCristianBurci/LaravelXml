$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
});

$(document).ready(function() {
    $("#regionSelect").change(function() {
        let selectedValue = $(this).val();
        let selectedRegions = [selectedValue, "title"];

        $("#tableWrapper")
            .children()
            .each((index, element) => {
                if (
                    !selectedRegions.includes($(element).data("region")) &&
                    selectedValue != ""
                ) {
                    $(element).hide();
                } else {
                    $(element).show();
                }
            });
    });
});
