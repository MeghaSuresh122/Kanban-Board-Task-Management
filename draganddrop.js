function drag(ev)
{
    ev.dataTransfer.setData("text", ev.target.id);
}
function allowDrop(ev)
{
    ev.preventDefault();
}
function drop(ev)
{
    ev.preventDefault();
    var dataId = ev.dataTransfer.getData("text");
    $.ajax({
        url: "dropped.php",
        type: "GET",
        data: {
            element: dataId,
            targetelement: ev.target.id
        },
        success: function(response)
        {
            ev.target.id=response.category;
            //window.alert(ev.target.id);
        },

    });
    
    document.getElementById(ev.target.id).appendChild(document.getElementById(dataId));
    location.reload();
}