<template>
    <card class="flex bg-90 flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h1 class="text-center text-2xl text-80 font-light">
            	<button class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 border border-blue-darker rounded" @click.prevent="handleButton">
            		Edit Environment File
                </button>
            </h1>
        </div>

        <portal to="modals">
            <transition name="fade">
                <modal v-if="isModalOpen">
			        <div class="bg-white rounded-lg shadow-lg overflow-hidden" style="width: 800px;">
			            <div class="p-8">
			                <heading :level="2" class="mb-6">Edit Environment File</heading>
			                <editor @new-value="newValue = $event" :value="currentValue"></editor>
			            </div>

			            <div class="bg-30 px-6 py-3 flex">
			                <div class="ml-auto">
			                    <button type="button" data-testid="cancel-button" @click.prevent="handleCancel" class="btn text-80 font-normal h-9 px-3 mr-3 btn-link">Cancel</button>
			                    <button data-testid="confirm-button" :disabled="isSaving" @click.prevent="handleSave" class="btn btn-default btn-danger" :class="{ 'cursor-not-allowed': isSaving, 'opacity-50': isSaving }">
			                    	<span v-if="isSaving">Saving</span>
			                    	<span v-else>Save</span>
			                    </button>
			                </div>
			            </div>
			        </div>
			    </modal>
            </transition>
        </portal>
    </card>
</template>

<script>
import Editor from './Editor'

export default {
    props: ['card'],
    components: {
        Editor
    },

    data: () => ({
        currentValue: '',
    	newValue: '',
        isModalOpen: false,
        isSaving: false,
    }),

    methods: {
    	handleButton() {
    		this.isModalOpen = true

    		Nova.request()
	        	.get(`/nova-vendor/nova-env-card/environment`)
	        	.then(response => {
	        		this.currentValue = response.data;
	        	})
    	},

        handleCancel() {
        	this.isModalOpen = false

            this.currentValue = ''
            this.newValue = ''
        },

        handleSave() {
        	this.isSaving = true

        	Nova.request()
	        	.post(`/nova-vendor/nova-env-card/environment`, {
	            	value: this.newValue
	        	})
	        	.then(response => {
	        		this.isSaving = false
	        		this.isModalOpen = false
	        	})

            this.currentValue = ''
            this.newValue = ''
        },
    },
}
</script>



