window.onload = function () {
    var autoJumpLink = document.querySelector('a.auto-jump');
    if (autoJumpLink) {
        setTimeout(function () {
            autoJumpLink.click();
        }, 1000);
    }
};
