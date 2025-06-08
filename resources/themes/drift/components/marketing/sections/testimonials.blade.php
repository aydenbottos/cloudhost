<section class="relative z-10 w-full -mb-5 sm:-mb-0 sm:pt-12 mb:pb-0">
    <div class="px-5 mx-auto max-w-7xl md:px-8">
        <x-marketing.elements.heading
            heading="What Our Clients Say"
            description="Trusted by WordPress professionals around the world. See why developers and agencies choose CloudHost for their mission-critical WordPress sites."
        />
        <div class="grid w-full grid-cols-4 gap-6 sm:grid-cols-8 lg:grid-cols-12">
            <div class="col-span-4 space-y-6">
                @include('theme::partials.testimonial', [
                    'image' => 'https://cdn.devdojo.com/images/january2022/01-john-robertson.jpeg',
                    'name' => 'Sarah Johnson',
                    'title' => 'Lead Developer at WebCraft',
                    'quote' => 'CloudHost\'s performance is unmatched. We\'ve migrated over 30 client sites and have seen load times decrease by 70% on average. The built-in caching and CDN configuration make optimization almost effortless.'
                ])
                @include('theme::partials.testimonial', [
                    'image' => 'https://cdn.devdojo.com/images/january2022/02-mike-samson.jpeg',
                    'name' => 'Michael Chen',
                    'title' => 'CTO at DigitalPeak',
                    'quote' => 'After years of wrestling with other hosting platforms, CloudHost is a breath of fresh air. The SSH access and Git integration are flawless. It\'s like having a custom VPS with the reliability of managed hosting.'
                ])
                @include('theme::partials.testimonial', [
                    'image' => 'https://cdn.devdojo.com/images/january2022/03-jack-bennington.jpeg',
                    'name' => 'Emma Rodriguez',
                    'title' => 'Founder at WP Accelerate',
                    'quote' => 'My agency manages over 50 client sites, and CloudHost\'s staging environments are a game-changer. The one-click cloning and visual comparison tools have cut our development time in half.'
                ])
            </div>

            <div class="hidden col-span-4 space-y-5 sm:block">
                @include('theme::partials.testimonial', [
                    'image' => 'https://cdn.devdojo.com/images/january2022/04-steve-mitchell.jpeg',
                    'name' => 'David Thompson',
                    'title' => 'E-commerce Specialist at ShopifyWP',
                    'quote' => 'Our WooCommerce stores used to crash during sales events. Since moving to CloudHost, we\'ve handled Black Friday traffic spikes of 30x normal volume without a hiccup. The automatic scaling is worth every penny.'
                ])
                @include('theme::partials.testimonial', [
                    'image' => 'https://cdn.devdojo.com/images/january2022/05-ron-garrison.jpeg',
                    'name' => 'Alex Patel',
                    'title' => 'Security Consultant at SecurePress',
                    'quote' => 'As a security specialist, I\'m impressed with CloudHost\'s approach to WordPress protection. The WAF implementation, automatic updates, and malware scanning give my clients peace of mind.'
                ])
                @include('theme::partials.testimonial', [
                    'image' => 'https://cdn.devdojo.com/images/january2022/06-charlie-madocks.jpeg',
                    'name' => 'Jessica Williams',
                    'title' => 'Director of Digital at Omnimedia',
                    'quote' => 'CloudHost\'s Redis object caching transformed our multisite network performance. Database-heavy operations that used to take seconds now happen instantly, making the admin experience lightning-fast.'
                ])
            </div>

            <div class="hidden col-span-4 space-y-5 lg:block">
                @include('theme::partials.testimonial', [
                    'image' => 'https://cdn.devdojo.com/images/january2022/07-nick-thompson.jpeg',
                    'name' => 'Marcus Bennett',
                    'title' => 'WordPress Core Contributor',
                    'quote' => 'As someone who works on WordPress core, I need a hosting environment that can handle frequent updates and testing. CloudHost\'s development tools and WP-CLI integration make my workflow seamless.'
                ])
                @include('theme::partials.testimonial', [
                    'image' => 'https://cdn.devdojo.com/images/january2022/08-jake-walters.jpeg',
                    'name' => 'Olivia Nguyen',
                    'title' => 'Performance Engineer at SpeedWP',
                    'quote' => 'The NVMe storage at CloudHost is a game-changer for database performance. Our largest client site with 500K+ posts now loads in under 200ms. No other WordPress host has matched this level of speed.'
                ])
                @include('theme::partials.testimonial', [
                    'image' => 'https://cdn.devdojo.com/images/january2022/09-sam-robinson.jpeg',
                    'name' => 'Ryan Jackson',
                    'title' => 'Lead Developer at WPAgency',
                    'quote' => 'CloudHost\'s support team understands WordPress at a developer level. When we had a plugin conflict issue, they didn\'t just diagnose it—they helped us fix it with a custom solution. Truly exceptional service.'
                ])
            </div>

        </div>
    </div>
    <div class="absolute bottom-0 left-0 z-20 flex items-end justify-center w-full h-32 md:h-64 lg:h-96 bg-gradient-to-t from-white dark:from-black"></div>
</section>