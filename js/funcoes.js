$(document).ready(function() {

    var inicial = null;
    var final = null;
    var jobName = null;

    $('[name=jobName]').keyup(function(event){
        jobName = $(this).val();
    });

    $('#play').click(function(event){
        $('#cronometro').countdown('destroy');
        $('#cronometro').countdown({
            since: new Date(),
            format: 'HMS'
        });
        inicial = (new Date().getTime() / 1000).toFixed(0);
    });

    $('#stop').click(function(event){
        $('#cronometro').countdown('pause');
        final = (new Date().getTime() / 1000).toFixed(0);
        $.post('cronometro.php', {inicial:String(inicial), final:String(final), jobName:String(jobName)}, function(retorno){
            eval(retorno);
        });
    });

});