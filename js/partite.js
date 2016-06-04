/**
 * Created by luca on 26/05/16.
 */

$(function () {
    function changeMatchData() {
        var culo = $(this);
        var culone = culo.closest("tr");
        console.log(culo);
        console.log("id", culo.attr("data-id"));

        $("#modifica-id").text(culo.attr("data-id"));
        $("#modifica-locale").val(culone.find(".squadra-locale").text());
        $("#modifica-ospite").val(culone.find(".squadra-ospite").text());
        $("#modifica-gol-locale").text(culone.find(".gol-locale").text());
        $("#modifica-gol-ospiti").text(culone.find(".gol-ospiti").text());
    }

    $(".btn-modifica").click(changeMatchData);
});

$(function () {
    $('#datetimepicker1').datetimepicker();
}); 