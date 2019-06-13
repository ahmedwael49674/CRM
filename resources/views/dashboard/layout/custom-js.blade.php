<script>
    function logout() {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }

    $(document).ready(function () {

        @if (session()->has('msg'))
        toastr["success"]("{{session()->get('msg')}}");
        @endif

        $(".warning-alert").click(function () {
            let clickedBtn = $(this);
            swal({
                title: clickedBtn.attr("data-msg"),
                text: "",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel",
            }).then(function () {
                $.ajax({
                    url: clickedBtn.attr("data-url"),
                    type: "POST",
                    data: {
                        _token: clickedBtn.attr("data-csrf"),
                        _method: clickedBtn.attr("data-method")
                    },
                    success: function (data) {
                        if (data.status == 1) {
                            clickedBtn.parents('tr').remove();
                            toastr["success"]("Deleted successfully");
                        } else {
                            toastr["error"]("Somthing went wrong.");
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        // toastr["error"]("Somthing went wrong.");
                    }
                });
            }).catch(function (reason) {
                console.log("Somthing went wrong => " + reason);
            });
        });

    });
</script>