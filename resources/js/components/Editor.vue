<template>
	<textarea class="w-full h-full form-control form-input form-input-bordered py-3 min-h-textarea" ref="theTextarea"></textarea>
</template>

<style src="codemirror/lib/codemirror.css" />

<script>
import CodeMirror from 'codemirror'
import 'codemirror/mode/shell/shell'

export default {
	props: ['value'],

    data: () => ({ codemirror: null }),

	mounted() {
        const config = {
            tabSize: 4,
            indentWithTabs: true,
            lineWrapping: true,
            lineNumbers: true,
            mode: "text/x-sh"
        }

        this.codemirror = CodeMirror.fromTextArea(this.$refs.theTextarea, config)

        this.doc.on('change', (cm, changeObj) => {
            this.$emit('new-value', cm.getValue())
        })

        this.$watch('value', () => {
			this.doc.setValue(this.value)
		})
    },

    computed: {
        doc() {
            return this.codemirror.getDoc()
        },
    },
}
</script>