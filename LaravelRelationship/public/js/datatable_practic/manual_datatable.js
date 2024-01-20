$(document).ready(function () {
    loadData();
    async function loadData() {
        $.ajax({
            type: "get",
            url: "/load-manual-data",
            success: function (result) {
                var para = "";
                for (var i = 0; i < result.data.length; i++) {
                    para += `<p><span>${i + 1}</span> <span>${result.data[i].name}</span> <span>${result.data[i].email}</span></p>`
                }
                var page = "";
                for (var i = 0; i <= result.page; i++) {
                    page += `<button class="page_btn" value="${i}">${i + 1}</button>`;
                }
                $('.data_div').eq(0).html(para);
                $('.page_div').eq(0).html(page);
                console.log(result.page);
            }, error: function (data) {
                console.log(data);
            }
        });
    }
    $(document).on('click', '.page_btn', function () {
        var value = $(this).val();
        $.ajax({
            type: "get",
            url: "/load-page-manual-data",
            data: {
                index: value
            },
            success: function (result) {
                var para = "";
                for (var i = 0; i < result.data.length; i++) {
                    para += `<p><span>${i + 1}</span> <span>${result.data[i].name}</span> <span>${result.data[i].email}</span></p>`
                }
                $('.data_div').eq(0).html(para);
            }, error: function (data) {
                console.log(data);
            }
        });
    });
    $(document).on('input', '#search_data', function (e) {
        var value = $(this).val();
        $.ajax({
            type: "get",
            url: "url",
            data: {
                search_value: value
            },
            success: function (result) {
                console.log(result.data)
            }, error: function (data) {
                console.log(data);
            }
        });
    });
});
