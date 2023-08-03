$(document).ready(function () {
    // Khi click vào nút "Chọn tất cả"
    $("#check-all").click(function () {
        // Chọn (check) chỉ các checkbox có thuộc tính enabled (không bị vô hiệu hóa)
        $(":checkbox").not(":disabled").prop("checked", true);
    });

    // Khi click vào nút "Bỏ chọn tất cả"
    $("#clear-all").click(function () {
        // Bỏ chọn (uncheck) chỉ các checkbox có thuộc tính enabled (không bị vô hiệu hóa)
        $(":checkbox").not(":disabled").prop("checked", false);
    });

    // Khi click vào nút "Xóa các mục đã chọn"
    $("#btn-delete").click(function () {
        // Lấy danh sách các checkbox có thuộc tính enabled (không bị vô hiệu hóa) và đã được chọn
        var enabledCheckedCheckboxes = $(":checkbox:enabled:checked");

        // Nếu không có checkbox nào được chọn trong danh sách đã lấy, thông báo yêu cầu chọn ít nhất một mục và ngăn chặn gửi form
        if (enabledCheckedCheckboxes.length === 0) {
            alert("Vui lòng chọn ít nhất một mục!");
            return false;
        }
    });
});