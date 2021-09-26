
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
    success: function (label) {
        label.attr('id', 'valid');
    },
});
$("#myform").validate({
    rules: {
        username: {
            required: true,
            pattern: /^[A-Za-z][A-Za-z0-9]{5,14}$/
            // pattern: "^(?=[a-zA-Z0-9._]{8,20}$)(?!.*[_.]{2})[^_.].*[^_.]$"
        },
        your_email: {
            required: true,
            email: true,
            // pattern: "/[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}/igm"

        },
        password: {
            required: true,
            // "required",
            // pattern: /^(?=.*[a-z])(?=.*[0-9])(?=.{8,})/
        },
        confirm_password: {
            required: true,
            equalTo: "#password"
        }
    },
    messages: {
        username: {
            required: "Please enter an username"
        },
        your_email: {
            required: "Please provide an email"
        },
        password: {
            required: "Please provide a password"
        },
        confirm_password: {
            required: "Please provide a password",
            equalTo: "Wrong Password"
        }
    }
});
