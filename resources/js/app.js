import './bootstrap';
import axios from 'axios';

const nameField = document.getElementById('name');
const nicknameField = document.getElementById('nickname');
const weightField = document.getElementById('weight');
const heightField = document.getElementById('height');
const genderField = document.getElementById('gender');
const colorField = document.getElementById('color');
const friendlinessField = document.getElementById('friendliness');
const birthdayField = document.getElementById('birthday');
const form = document.getElementById('form');

form.addEventListener('submit', (event) => {
  event.preventDefault()
  let validityArray = [];
  validityArray.push(validationResult(nameField, 'name', 'required', nameField.value !== ''));
  validityArray.push(validationResult(weightField, 'weight', 'negative', isNaN(weightField.value) || weightField.value > 0));
  validityArray.push(validationResult(heightField, 'height', 'negative', isNaN(heightField.value) || heightField.value > 0));
  validityArray.push(validationResult(genderField, 'gender', 'required', genderField.value !== ''));
  validityArray.push(validationResult(birthdayField, 'birthday', 'required', birthdayField.value !== ''));


  if (!validityArray.includes(false)) {
    const payload = {
      'name': nameField.value,
      'nickname': nicknameField.value,
      'weight': weightField.value,
      'height': heightField.value,
      'gender': genderField.value,
      'color': colorField.value,
      'friendliness': friendlinessField.value,
      'birthday': birthdayField.value
    };

    return form.method === 'POST' ? createData(payload) : updateData(payload);;
  }
  Swal.fire({
    title: 'Error!',
    text: 'There are errors in your data',
    icon: 'error',
    confirmButtonText: 'Ok'
  })
});

const validationResult = (element, field, errorType, isValid = true) => {
  if (isValid === true) {
    element.classList.remove('border-danger');
    element.nextElementSibling.innerText = '';

    return isValid;
  }
  if (errorType === 'required') {
    element.nextElementSibling.innerText = `The ${field} field is required`;
  }
  if (errorType === 'negative') {
    element.nextElementSibling.innerText = `The ${field} field must be a positive number`;
  }
  element.classList.add('border-danger');

  return isValid;
}

const createData = async (payload) => {
  const result = await axios.post(
    '/api/create-data',
    payload
  )
  if (result.status < 300) {
    Swal.fire({
      icon: 'success',
      title: 'Kangaroo data successfully saved!',
      showConfirmButton: false,
      timer: 2000
    })
    nameField.value = ''
    nicknameField.value = ''
    weightField.value = ''
    heightField.value = ''
    genderField.value = ''
    colorField.value = ''
    friendlinessField.value = ''
    birthdayField.value = ''

    return
  }
  Swal.fire({
    title: 'Error!',
    text: 'Server error',
    icon: 'error',
    confirmButtonText: 'Ok'
  })
}

const updateData = async (payload) => {
  const currentUrl = window.location.pathname.split('/');
  const result = await axios.post(
    '/api/update-data',
    {
      id: currentUrl[2],
      ...payload
    }
  )
  if (result.status < 300) {
    Swal.fire({
      icon: 'success',
      title: 'Kangaroo data successfully updated!',
      showConfirmButton: false,
      timer: 2000
    })

    return
  }
  Swal.fire({
    title: 'Error!',
    text: 'Server error',
    icon: 'error',
    confirmButtonText: 'Ok'
  })
}
