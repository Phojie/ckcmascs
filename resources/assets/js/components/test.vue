<template>
<div>
  <div class="form-group" v-bind:class="{ 'form-group--error': $v.name.$error }">
    <label class="form__label">Name</label>
    <input class="form__input" v-model.trim="name" @input="$v.name.$touch()">
  </div><span class="form-group__message" v-if="!$v.name.required">Field is required</span><span class="form-group__message" v-if="!$v.name.minLength">Name must have at least {{$v.name.$params.minLength.min}} letters.</span>
  <pre>name: {{ $v.name }}</pre>
  <div class="form-group" v-bind:class="{ 'form-group--error': $v.age.$error }">
    <label class="form__label">Age</label>
    <input class="form__input" v-model.trim="age" @blur="$v.age.$touch()">
  </div><span class="form-group__message" v-if="!$v.age.between">Must be between {{$v.age.$params.between.min}} and {{$v.age.$params.between.max}}</span>
  <pre>age: {{ $v.age }}</pre>
</div>

</template>

<script>
Vue.use(Vuelidate)
import Vuelidate from 'vuelidate'
import { required, minLength, between } from 'vuelidate/lib/validators'

export default {
  data () {
    return {
      name: '',
      age: 0
    }
  },
  validations: {
    name: {
      required,
      minLength: minLength(4)
    },
    age: {
      between: between(20, 30)
    }
  }
}
</script>