<template>
	<div class="container">
		<!-- login form -->
		<div class="row mt-4">
			<div class="col-6 offset-3">
				<form action="#" @submit.prevent="handlelogin">
					<h3>Sign in for Secrets</h3>
					<div class="form-row">
						<input class="form-control" type="email" name="email" placeholder="Email Address" v-model="formData.email">
					</div>
					<div class="form-row">
						<input class="form-control" type="password" name="password" placeholder="Password" v-model="formData.password"></input>
					</div>
					<div class="form-row">
						<button class="btn btn-primary" type="submit">Sign In</button>
					</div>
				</form>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-6 offset-3">
				<div class="form-row">
					<button class="btn btn-primary" type="submit" @click.prevent="logout">Logout</button>
				</div>
			</div>
		</div>

		<!-- secrets list -->
	</div>
</template>

<script>
	export default {

		data() {
			return {
				secrets: [],
				formData: {
					email: '',
					password: ''
				}
			}
		},
		methods: {

			handlelogin() {
				axios.get('/sanctum/csrf-cookie').then(response => {

					axios.post('/login', this.formData).then(response => {
						console.log(response);
					}).catch(error=>{
					    console.log(error.response.email);
					})
					
				});
			},

			logout() {
				axios.post('/logout').then(res => {
					console.log(res);
				});
			}
			
		}

	}
</script>

<style>
	.form-row {
		margin-bottom: 8px;
	}
</style>