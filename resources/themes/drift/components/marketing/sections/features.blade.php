<section 
    x-data="{ 
        active: 'authentication',
        sections: ['authentication', 'roles-permissions', 'payments', 'subscriptions'],
        featureInterval: null,
        featureIntervalTimer: 6000, // in milliseconds
        percentageRemainingInterval: null,
        percentageRemaining: 100,
        start(){
            clearInterval(this.featureInterval);
            let that = this;
            this.featureInterval = setInterval(function(){
                that.next();
            }, this.featureIntervalTimer);
        },
        hasBeenActive(sectionName){
            let currentIndex = this.sections.indexOf(this.active);
            let targetIndex = this.sections.indexOf(sectionName);
            return targetIndex < currentIndex;
        },
        startCountdown(){
            this.percentageRemaining = 100;
            clearInterval(this.percentageRemainingInterval); // Ensure the interval is cleared before starting a new countdown
            let that = this;
            this.percentageRemainingInterval = setInterval(function(){
                that.percentageRemaining -= 100 / (that.featureIntervalTimer / 120); // Assuming 6000ms interval and 1000ms = 1s
                that.percentageRemaining = parseInt(that.percentageRemaining);
                if (that.percentageRemaining <= 0) {
                    clearInterval(that.percentageRemainingInterval); // Clear the interval when percentageRemaining reaches 0
                }
            }, 120); // Update percentageRemaining every 100ms
        },
        next(){
            let currentIndex = this.sections.indexOf(this.active);
            let nextIndex = (currentIndex + 1) % this.sections.length;
            this.active = this.sections[nextIndex];
            this.startCountdown(); // Start a new countdown for the next feature
        },
        setActive(sectionName){
            this.active = sectionName;
            this.start();
            this.startCountdown(); // Start a new countdown when the active section is set
        },
        getWidth(sectionName){
            if(sectionName == this.active){
                return (100-this.percentageRemaining);
            } 
            return 0;
        }
    }"
    x-init="
        start();
        startCountdown();
    "
    class="pt-6 sm:pb-8 sm:pt-10 md:pt-12 lg:pt-16 bg-background">
    <div class="px-5 mx-auto max-w-7xl md:px-8">
        <x-marketing.elements.heading
            subheading="WordPress Hosting Reimagined"
            heading="Built for Performance and Control"
            description="CloudHost delivers an optimized WordPress hosting platform with the performance and flexibility developers demand. Our infrastructure is built from the ground up for speed and customization."
        />

        <div class="mt-10 mb-8 md:mt-16 md:mb-15">
            <div class="grid md:grid-cols-4 md:gap-6 mt-10">
                <button 
                    x-on:click="setActive('performance')" 
                    x-bind:class="active == 'performance' ? 'bg-primary/5 dark:bg-primary/10 border-primary/50 text-primary' : hasBeenActive('performance') ? 'bg-gray-100 dark:bg-gray-800/60 border-background text-muted-foreground' : 'hover:bg-gray-100 dark:hover:bg-gray-800/30 hover:border-primary/20 bg-background border-background'" 
                    class="relative w-full px-4 pt-10 pb-5 text-left border rounded-xl transition duration-300 ring-1 ring-transparent">
                    <div class="flex items-start w-full gap-5">
                        <div class="pt-0.5">
                            <div class="flex items-center justify-center w-10 h-10 overflow-hidden bg-white border rounded-full dark:bg-gray-900 border-gray-200/20 dark:border-gray-700/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m8 14-6 6h9v-3"/><path d="M18.4 3.5a2.4 2.4 0 0 1 3.1 3.1L10.5 17.7l-5 1.2 1.3-5"/></svg>
                            </div>
                        </div>
                        <div>
                            <p class="text-xl font-medium">Extreme Performance</p>
                            <p class="mt-2 text-sm opacity-80">Optimized servers and advanced caching for sub-second load times.</p>
                            <div
                                x-show="active == 'performance'"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-5"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="mt-4 h-[5px] w-full overflow-hidden rounded-full bg-primary/10 opacity-80 dark:bg-primary/20">
                                <div class="h-full rounded-full bg-primary transition-all duration-500" x-bind:style="'width: ' + (100-getWidth('performance')) + '%'"></div>
                            </div>
                        </div>
                    </div>
                </button>

                <button 
                    x-on:click="setActive('developer-tools')" 
                    x-bind:class="active == 'developer-tools' ? 'bg-primary/5 dark:bg-primary/10 border-primary/50 text-primary' : hasBeenActive('developer-tools') ? 'bg-gray-100 dark:bg-gray-800/60 border-background text-muted-foreground' : 'hover:bg-gray-100 dark:hover:bg-gray-800/30 hover:border-primary/20 bg-background border-background'" 
                    class="relative w-full px-4 pt-10 pb-5 text-left border rounded-xl transition duration-300 ring-1 ring-transparent">
                    <div class="flex items-start w-full gap-5">
                        <div class="pt-0.5">
                            <div class="flex items-center justify-center w-10 h-10 overflow-hidden bg-white border rounded-full dark:bg-gray-900 border-gray-200/20 dark:border-gray-700/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7V5a2 2 0 0 1 2-2h2"></path><path d="M17 3h2a2 2 0 0 1 2 2v2"></path><path d="M21 17v2a2 2 0 0 1-2 2h-2"></path><path d="M7 21H5a2 2 0 0 1-2-2v-2"></path><path d="M8 14h.01"></path><path d="M12 14h.01"></path><path d="M16 14h.01"></path><path d="M8 10h.01"></path><path d="M12 10h.01"></path><path d="M16 10h.01"></path></svg>
                            </div>
                        </div>
                        <div>
                            <p class="text-xl font-medium">Developer Tools</p>
                            <p class="mt-2 text-sm opacity-80">SSH access, Git integration, WP-CLI, and staging environments.</p>
                            <div
                                x-show="active == 'developer-tools'"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-5"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="mt-4 h-[5px] w-full overflow-hidden rounded-full bg-primary/10 opacity-80 dark:bg-primary/20">
                                <div class="h-full rounded-full bg-primary transition-all duration-500" x-bind:style="'width: ' + (100-getWidth('developer-tools')) + '%'"></div>
                            </div>
                        </div>
                    </div>
                </button>

                <button 
                    x-on:click="setActive('scalability')" 
                    x-bind:class="active == 'scalability' ? 'bg-primary/5 dark:bg-primary/10 border-primary/50 text-primary' : hasBeenActive('scalability') ? 'bg-gray-100 dark:bg-gray-800/60 border-background text-muted-foreground' : 'hover:bg-gray-100 dark:hover:bg-gray-800/30 hover:border-primary/20 bg-background border-background'" 
                    class="relative w-full px-4 pt-10 pb-5 text-left border rounded-xl transition duration-300 ring-1 ring-transparent">
                    <div class="flex items-start w-full gap-5">
                        <div class="pt-0.5">
                            <div class="flex items-center justify-center w-10 h-10 overflow-hidden bg-white border rounded-full dark:bg-gray-900 border-gray-200/20 dark:border-gray-700/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.85.84 6.71 2.26"></path><path d="M9 9h.01"></path><path d="M15 15h.01"></path><path d="M21 12l-3 1v-2l-3 1v-2l-3 1V9l-3 1V8l-3 1V7"></path></svg>
                            </div>
                        </div>
                        <div>
                            <p class="text-xl font-medium">Elastic Scalability</p>
                            <p class="mt-2 text-sm opacity-80">Automatically scales to handle traffic spikes without downtime.</p>
                            <div
                                x-show="active == 'scalability'"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-5"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="mt-4 h-[5px] w-full overflow-hidden rounded-full bg-primary/10 opacity-80 dark:bg-primary/20">
                                <div class="h-full rounded-full bg-primary transition-all duration-500" x-bind:style="'width: ' + (100-getWidth('scalability')) + '%'"></div>
                            </div>
                        </div>
                    </div>
                </button>

                <button 
                    x-on:click="setActive('security')" 
                    x-bind:class="active == 'security' ? 'bg-primary/5 dark:bg-primary/10 border-primary/50 text-primary' : hasBeenActive('security') ? 'bg-gray-100 dark:bg-gray-800/60 border-background text-muted-foreground' : 'hover:bg-gray-100 dark:hover:bg-gray-800/30 hover:border-primary/20 bg-background border-background'" 
                    class="relative w-full px-4 pt-10 pb-5 text-left border rounded-xl transition duration-300 ring-1 ring-transparent">
                    <div class="flex items-start w-full gap-5">
                        <div class="pt-0.5">
                            <div class="flex items-center justify-center w-10 h-10 overflow-hidden bg-white border rounded-full dark:bg-gray-900 border-gray-200/20 dark:border-gray-700/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path></svg>
                            </div>
                        </div>
                        <div>
                            <p class="text-xl font-medium">Enterprise Security</p>
                            <p class="mt-2 text-sm opacity-80">Advanced WAF, malware scanning, and automatic updates.</p>
                            <div
                                x-show="active == 'security'"
                                x-transition:enter="transition ease-out duration-300 transform"
                                x-transition:enter-start="opacity-0 translate-y-5"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="mt-4 h-[5px] w-full overflow-hidden rounded-full bg-primary/10 opacity-80 dark:bg-primary/20">
                                <div class="h-full rounded-full bg-primary transition-all duration-500" x-bind:style="'width: ' + (100-getWidth('security')) + '%'"></div>
                            </div>
                        </div>
                    </div>
                </button>
            </div>
        </div>

        <div class="relative overflow-hidden bg-background dark:bg-gray-900/30 border border-gray-200 dark:border-gray-800 rounded-xl">
            <div class="absolute w-full h-full scale-[1.7] opacity-50">
                <x-marketing.elements.colorful-mesh class="w-full h-full  dark:opacity-40 opacity-30" />
            </div>
            <div class="relative w-full h-full p-8 bg-white/50 rounded-xl dark:bg-gray-950/20 backdrop-blur-xl">
                <div 
                    x-show="active == 'performance'" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="flex flex-col lg:flex-row gap-10 lg:gap-5">
                    <div class="flex flex-col w-full max-w-md">
                        <p class="text-xl font-medium">Blazing-Fast Load Times</p>
                        <p class="mt-2 text-muted-foreground">Our WordPress hosting platform is optimized at every level for maximum speed:</p>
                        <ul class="mt-4 space-y-2">
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary flex-shrink-0 mt-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                                <span>NVMe SSD storage for lightning-fast database operations</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary flex-shrink-0 mt-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                                <span>Built-in Redis object caching for reduced database load</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary flex-shrink-0 mt-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                                <span>Global CDN with 250+ edge locations for fast content delivery</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary flex-shrink-0 mt-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                                <span>Advanced PHP optimization with OPcache and JIT compilation</span>
                            </li>
                        </ul>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <img src="https://cdn.devdojo.com/images/september2024/performance-chart.png" alt="WordPress Performance Chart" class="object-cover rounded-lg shadow-lg">
                    </div>
                </div>

                <div 
                    x-show="active == 'developer-tools'" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="flex flex-col lg:flex-row gap-10 lg:gap-5">
                    <div class="flex flex-col w-full max-w-md">
                        <p class="text-xl font-medium">Built for Developers</p>
                        <p class="mt-2 text-muted-foreground">Take complete control of your WordPress environment with our developer-focused tools:</p>
                        <ul class="mt-4 space-y-2">
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary flex-shrink-0 mt-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                                <span>Full SSH access with root privileges for complete control</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary flex-shrink-0 mt-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                                <span>Git deployment workflows with automatic CI/CD pipelines</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary flex-shrink-0 mt-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                                <span>WP-CLI, Composer, and local development tooling</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 text-primary flex-shrink-0 mt-0.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg>
                                <span>Staging environments with database cloning and visual comparison</span>
                            </li>
                        </ul>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <img src="https://cdn.devdojo.com/images/september2024/code-editor.png" alt="Developer Tools" class="object-cover rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
