<template>
    <card class="flex bg-90 flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h1 class="text-center text-3xl text-80 font-light">
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
			                <textarea class="w-full h-full form-control form-input form-input-bordered py-3 min-h-textarea" cols="30" rows="20" v-model="value"></textarea>
			            </div>

			            <div class="bg-30 px-6 py-3 flex">
			                <div class="ml-auto">
			                    <button type="button" data-testid="cancel-button" @click.prevent="handleCancel" class="btn text-80 font-normal h-9 px-3 mr-3 btn-link">Cancel</button>
			                    <button ref="confirmButton" data-testid="confirm-button" :disabled="isSaving" @click.prevent="handleSave" class="btn btn-default btn-danger" :class="{ 'cursor-not-allowed': isSaving, 'opacity-50': isSaving }">
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
export default {
    props: ['card'],

    data() {
        return {
        	value: '',
            isModalOpen: false,
            isSaving: false,
        }
    },

    methods: {
    	handleButton() {
    		this.isModalOpen = true

    		Nova.request()
	        	.get(`/nova-vendor/nova-env-card/environment`)
	        	.then(response => {
	        		this.value = response.data;
	        	})
    	},

        handleCancel() {
        	this.isModalOpen = false
        },

        handleSave() {
        	this.isSaving = true

        	Nova.request()
	        	.post(`/nova-vendor/nova-env-card/environment`, {
	            	value: this.value
	        	})
	        	.then(response => {
	        		this.isSaving = false
	        		this.isModalOpen = false
	        	})
        },
    },
}
</script>

