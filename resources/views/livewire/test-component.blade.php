<div x-data="{ open: false }">
    <button @click="open = !open">Toggle</button>
    <span x-show="open">Hello Alpine!</span>
</div>
