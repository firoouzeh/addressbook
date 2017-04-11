
$(document).ready(function() {
    $('#group-select').multiselect({
        maxHeight: 400,
        dropUp: true        
    });
});

$(function()
{
    $(document).on('click', '.btn-email', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            appendEmail = $('.appendEmail'),
            currentEntry = $(this).parents('.emailClass:first'),
            newEmailEntry = $(currentEntry.clone()).appendTo(appendEmail);

        newEmailEntry.find('input').val('');
        controlForm.find('.emailClass:not(:last) .btn-email')
            .removeClass('btn-email').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
        $(this).parents('.emailClass:first').remove();

        e.preventDefault();
        return false;
    });

    $(document).on('click', '.btn-number', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            appendNumber = $('.appendNumber'),
            currentEntry = $(this).parents('.numberClass:first'),
            newEmailEntry = $(currentEntry.clone()).appendTo(appendNumber);

        newEmailEntry.find('input').val('');
        controlForm.find('.numberClass:not(:last) .btn-number')
            .removeClass('btn-number').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
        $(this).parents('.numberClass:first').remove();

        e.preventDefault();
        return false;
    });


    $(document).on('click', '.btn-address', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            appendAddress = $('.appendAddress'),
            currentEntry = $(this).parents('.addressClass:first'),
            newAddressEntry = $(currentEntry.clone()).appendTo(appendAddress);

        newAddressEntry.find('input').val('');
        controlForm.find('.addressClass:not(:last) .btn-address')
            .removeClass('btn-address').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
        $(this).parents('.addressClass:first').remove();

        e.preventDefault();
        return false;
    });
});
