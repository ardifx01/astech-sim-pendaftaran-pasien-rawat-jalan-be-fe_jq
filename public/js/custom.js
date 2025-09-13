function setError($el, message) {
    $el.addClass('is-invalid');
    let $msg = $el.next('.invalid-feedback');
    if ($msg.length === 0) {
        $msg = $('<div class="invalid-feedback d-block"></div>');
        $el.after($msg);
    }
    $msg.text(message);
}

function clearError($el) {
    $el.removeClass('is-invalid');
    const $msg = $el.next('.invalid-feedback');
    if ($msg.length) $msg.remove();
}