<template>
	<form id="RegisterForm" action="subs.php" method="post">
		<input name="Mail" placeholder="Entrer votre email" type="email" required/>
		
		<input type="hidden"  name="FormIntent" :value="intent" />
		
		<div class="bouton">
			<button class="mdl-button mdl-js-button mdl-button--raised">
			{{intent}}
			</button>
		</div>
	</form>
</template>

<script>
module.exports = {
	props: ['intent'],
	data : function() {
	},
	mounted () {
		console.log('Mounted Form')
	}
}
</script>

<style scoped>
  span {
    background-color: yellow;
  }
</style>
