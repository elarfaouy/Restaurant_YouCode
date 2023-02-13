document.getElementById('btn-modal').addEventListener('click', ()=>{
    $('#modal').modal('show')
})

$('.formDelete').on('submit', function (){
    return confirm("Are you sure you wanna delete this Plat ?");
})
