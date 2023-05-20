document
  .querySelector('#register-form ')
  ?.addEventListener('submit', function (e) {
    const form = e.target

    const username = form.username.value
    const firstName = form.firstName.value
    const lastName = form.lastName.value
    const email = form.email.value
    const password = form.password.value
    const passwordConfirm = form.passwordConfirm.value

    let errorText = ''
    const passwordRegex = /[A-Z]{2,}(\d){1,}(\W){1,}/g

    if (password !== passwordConfirm) {
      errorText = 'Password does not match'
    } else if (
      !password.match(passwordRegex) ||
      !passwordConfirm.match(passwordRegex)
    ) {
      errorText =
        'Password must include two or more uppercase letters, 1 or more number and one or more special character'
    }

    if (errorText) {
      document.querySelectorAll('.password-error').forEach(passError => {
        passError.textContent = errorText

        setTimeout(() => {
          passError.textContent = ''
        }, 5_000)
      })
    }

    e.preventDefault()
  })

