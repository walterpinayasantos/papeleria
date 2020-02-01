! function(t) {
    "use strict";
    var e = function() {};
    e.prototype.init = function() {
        t("#sa-success").click(function() {
            Swal.fire({
                title: "Good job!",
                text: "You clicked the button!",
                type: "success",
                confirmButtonColor: "#188ae2"
            })
        }), t("#sa-warning").click(function() {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#31ce77",
                cancelButtonColor: "#f34943",
                confirmButtonText: "Yes, delete it!"
            }).then(function(t) {
                t.value && Swal.fire("Deleted!", "Your file has been deleted.", "success")
            })
        }), t("#sa-close").click(function() {
            var t;
            Swal.fire({
                title: "Auto close alert!",
                html: "I will close in <strong></strong> seconds.",
                timer: 2e3,
                onBeforeOpen: function() {
                    Swal.showLoading(), t = setInterval(function() {
                        Swal.getContent().querySelector("strong").textContent = Swal.getTimerLeft()
                    }, 100)
                },
                onClose: function() {
                    clearInterval(t)
                }
            }).then(function(t) {
                t.dismiss === Swal.DismissReason.timer && console.log("I was closed by the timer")
            })
        })
    }, t.SweetAlert = new e, t.SweetAlert.Constructor = e
}(window.jQuery),
function(t) {
    "use strict";
    window.jQuery.SweetAlert.init()
}();