$(".contactForm").submit((e) => {
  e.preventDefault();
  let form = e.currentTarget;
  $.ajax({
    type: "POST",
    url: "/mail/contact.php",
    data: $(form).serialize(),
    dataType: "json",
  })
    .done(function (data) {
      if (data.error) {
        $("#success").html(`
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Failed to send mail</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                </div>
            `);
        $(form)[0].reset();
      } else {
        $("#success").html(`
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Mail sent successfully</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                </div>
`);
        $(form)[0].reset();
      }
    })
    .fail(function (data) {
      $("#success").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Failed to send mail</strong>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                </div>
        `);
      $(form)[0].reset();
    });
});
