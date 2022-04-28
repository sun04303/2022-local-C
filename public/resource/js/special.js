$('.cl').on('click', e => {
    $('#edit').modal('hide')
})

document.querySelectorAll('.btn-success').forEach(item => {
    item.addEventListener('click', e => {
        $('input[name="id"]').val(e.target.dataset.id)
        $('input[name="special"]').val(e.path[1].children[1].innerText.split(' / ')[1])
        console.log($('input[name="id"]').val())
        $('#edit').modal('show')
    })
})