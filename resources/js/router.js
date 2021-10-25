/**
 * Configure Vue Router
 */
 import Vue from 'vue'
 import VueRouter from 'vue-router'
 
 /**
  * Pages View
  */
 import IndexPage from './components/Index'
 
 /**
  * Define routes
  */
 Vue.use(VueRouter)
 const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'index-page',
            component: IndexPage,
            meta: {
                title: 'Homepage | Parking Booking',
                transition: 'fade-in-down',
                metaTags: [
                    {
                        name: 'description',
                        content: 'Homepage | Parking Booking'
                    },
                    {
                        property: 'og:description',
                        content: 'Homepage | Parking Booking'
                    }
                ]
            }
        },
    ],
     
    /**
     *  Scroll Behavior On Every Page 
     */
    scrollBehavior (to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return { x: 0, y: 0 }
        }
    }
});
  
/**
 * Metadata callback start. (This callback runs before every route change, including on page load).
 */
router.beforeEach((to, from, next) => {
    // This goes through the matched routes from last to first, finding the closest route with a title.
    // eg. if we have /some/deep/nested/route and /some, /deep, and /nested have titles, nested's will be chosen.
    const nearestWithTitle = to.matched.slice().reverse().find(r => r.meta && r.meta.title);

    // Find the nearest route element with meta tags.
    const nearestWithMeta = to.matched.slice().reverse().find(r => r.meta && r.meta.metaTags);
    const previousNearestWithMeta = from.matched.slice().reverse().find(r => r.meta && r.meta.metaTags);

    // If a route with a title was found, set the document (page) title to that value.
    if(nearestWithTitle) document.title = nearestWithTitle.meta.title;

    // Remove any stale meta tags from the document using the key attribute we set below.
    Array.from(document.querySelectorAll('[data-vue-router-controlled]')).map(el => el.parentNode.removeChild(el));

    // Skip rendering meta tags if there are none.
    if(!nearestWithMeta) return next();

    // Turn the meta tag definitions into actual elements in the head.
    nearestWithMeta.meta.metaTags.map(tagDef => {
        const tag = document.createElement('meta');

        Object.keys(tagDef).forEach(key => {
            tag.setAttribute(key, tagDef[key]);
        });

        // We use this to track which meta tags we create, so we don't interfere with other ones.
        tag.setAttribute('data-vue-router-controlled', '');

        return tag;
    })
    // Add the meta tags to the document head.
    .forEach(tag => document.head.appendChild(tag));
    next();
});
 
export default router