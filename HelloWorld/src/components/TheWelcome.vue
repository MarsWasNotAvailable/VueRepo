<script setup>
import WelcomeItem from './WelcomeItem.vue'
import DocumentationIcon from './icons/IconDocumentation.vue'
import ToolingIcon from './icons/IconTooling.vue'
import EcosystemIcon from './icons/IconEcosystem.vue'
import CommunityIcon from './icons/IconCommunity.vue'
import SupportIcon from './icons/IconSupport.vue'
</script>

<template>
  <WelcomeItem>
    <template #icon>
      <DocumentationIcon />
    </template>
    <template #heading>What is Vue ?</template>

    <a href="https://vuejs.org/" target="_blank" rel="noopener">Vue</a>
	is a Javascript framework (written in superset Typescript),
	intended for front-end,
	it's open source,
	it uses a model-view-viewmodel (MVVM, aka ModelViewBinder) architecture
	(GUI in the front-end is separated from back-end)
	it extends HTML, and define common-use components
	uses HTML-based template
  </WelcomeItem>

  <WelcomeItem>
    <template #icon>
      <ToolingIcon />
    </template>
    <template #heading>Pros and Cons</template>

	pros:
	claims to be lightweight, versatile (tries to apply to many things), reactive

    <br />

	cons:
	looks like a lot of work for a simple thing

  </WelcomeItem>

  <WelcomeItem>
    <template #icon>
      <EcosystemIcon />
    </template>
    <template #heading>Technologie Adjacentes</template>

	Not sure I understood the question: what is used aside it ?
	HTML, nodejs (npm)
  </WelcomeItem>

  <WelcomeItem>
    <template #icon>
      <CommunityIcon />
    </template>
    <template #heading>Concurents</template>

	alternatives:

    <a href="https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93viewmodel#Implementations" target="_blank" rel="noopener">Wiki</a>
	<br />
    <a href="https://github.com/vuejs/petite-vue" target="_blank" rel="noopener">Petite Vue</a>
	<br />

	in javascript, there's Angular, among others

  </WelcomeItem>

</template>
