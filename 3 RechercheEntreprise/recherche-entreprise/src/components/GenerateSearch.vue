<script setup>
defineProps({
  HeadMessage: {
    type: String,
    required: true
  }
});
</script>

<template>
	<div class="greetings">
	<h1 class="green">{{ HeadMessage }}</h1>

	<form id="SearchForm" submit="OnFormSubmit"
			action="https://recherche-entreprises.api.gouv.fr/search"
			method="get"
			>
		<input name="q" placeholder="Termes de recherche" type="text" />
		<input name="code_postal" placeholder="Entrer votre code postale" type="text" pattern="\d*" />
		
		<div class="bouton">
			<button type="submit" class="mdl-button mdl-js-button mdl-button--raised"
			>
			Recherche
			</button>
			<button type="submit" formaction="#"
			onclick="OnCSV()"
			class="mdl-button mdl-js-button mdl-button--raised"
			>
			To CSV
			</button>
		</div>
	</form>

	</div>
</template>

<style scoped>
h1 {
  font-weight: 500;
  font-size: 2.6rem;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
}

.greetings h1,
.greetings h3 {
  text-align: center;
}

@media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}
</style>
