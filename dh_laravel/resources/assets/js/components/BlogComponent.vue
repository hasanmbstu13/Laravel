<template>
    <section id="blog2" v-if="overview">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="title space30">Cryptonews</h2>
                    <div class="search-box space10 float-right">
                        <label>Categories</label>
                        <el-select v-model="value5" multiple placeholder="Select" v-on:change="filterBlog">
                            <el-option
                            v-for="item in options"
                            :key="item.id"
                            :label="item.title"
                            :value="item.id">
                            </el-option>
                        </el-select>
                    </div>
                </div>
            </div>

            <div class="row space30">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="img-box box1" v-if="posts[0]" :key="posts[0].id" @click="showDetails(posts[0])" :style='{ backgroundImage: "url(" + posts[0].image + ")", }'>
                                <!-- <img src="img/crypto1.svg" class="img-fluid w-100"> -->
                                <div class="img-desc">
                                    <h6>{{ getCategories(posts[0].categories) }} <span>6 MIN READ</span></h6>
                                    <h4 class="space20">{{posts[0].title}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row space30 no-space">
                        <div class="col-lg-6">
                            <div class="img-box box2" v-if="posts[1]" @click="showDetails(posts[1])" :style='{ backgroundImage: "url(" + posts[1].image + ")", }'>
                                <!-- <img src="img/crypto2.svg" class="img-fluid w-100"> -->
                                <div class="img-desc">
                                    <h6>{{ getCategories(posts[1].categories) }} <span>6 MIN READ</span></h6>
                                    <h4 class="space20">{{posts[1].title}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="img-box box3" v-if="posts[2]" @click="showDetails(posts[2])" :style='{ backgroundImage: "url(" + posts[2].image + ")", }'>
                                <!-- <img src="img/crypto3.svg" class="img-fluid w-100"> -->
                                <div class="img-desc">
                                    <h6>{{ getCategories(posts[2].categories) }} <span>6 MIN READ</span></h6>
                                    <h4 class="space20">{{posts[2].title}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="img-box box4" v-if="posts[3]" @click="showDetails(posts[3])" :style='{ backgroundImage: "url(" + posts[3].image + ")", }'>
                        <!-- <img src="img/crypto4.svg" class="img-fluid w-100 h-100 obj-fit"> -->
                        <div class="img-desc">
                            <h6>{{ getCategories(posts[3].categories) }} <span>6 MIN READ</span></h6>
                            <h4 class="space20">{{posts[3].title}}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row space30">
                <div class="col-lg-6">
                    <div class="img-box box5" v-if="posts[4]" @click="showDetails(posts[4])" :style='{ backgroundImage: "url(" + posts[4].image + ")", }'>
                        <!-- <img src="img/crypto5.svg" class="img-fluid w-100"> -->
                        <div class="img-desc">
                            <h6>{{ getCategories(posts[4].categories) }} <span>6 MIN READ</span></h6>
                            <h4 class="space20">{{posts[4].title}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-box box6" v-if="posts[5]" @click="showDetails(posts[5])" :style='{ backgroundImage: "url(" + posts[5].image + ")", }'>
                        <!-- <img src="img/crypto6.svg" class="img-fluid w-100"> -->
                        <div class="img-desc box6">
                            <h6>{{ getCategories(posts[5].categories)}} <span>6 MIN READ</span></h6>
                            <h4 class="space20">{{posts[5].title}}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center space50">
                <div class="col-lg-12">
                    <pagination :data="laravelData" @pagination-change-page="fetchData" :limit="2">
                        <span slot="prev-nav"><i class="fa fa-angle-left"></i></span>
	                    <span slot="next-nav"><i class="fa fa-angle-right"></i></span>
                    </pagination>                    
                </div>
            </div>
        </div>
    </section>
    <section id="blog" v-else-if="detailPage">
	  <div class="container">
	    <div class="row">
	      <div class="col-lg-8 offset-lg-2">
	        <div class="row">
	          <div class="col-lg-12">
	            <h5>{{ getCategories(post.categories)}}</h5>
	            <h6>{{post.published_at | moment}} <span>6 MIN READ</span></h6>
	            <h2 class="title space30">{{post.title}}</h2>
                <div><p class="space30">{{post.text}}</p></div>                	            
	          </div>
	        </div>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-lg-12">
	        <div class="bg-img" :style='{ backgroundImage: "url(" + post.image + ")", }' >	          
	        </div>
	      </div>
	    </div>

	    <div class="row">
	      <div class="col-lg-8 offset-lg-2">
	        <div class="row">
	          <div class="col-lg-12">            
                  <p class="space30">{{post.text}}</p>
                  <p class="space30">
                      <a class="btn btn-primary" @click="backOverview"> back to overview </a>
                  </p>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</section>   
</template>

<script>
    export default {        
        //props:['url'],
        data() {
            return {
                overview:false,
                detailPage:false,
                posts:[],
                url:'/api/blogs',
                post:[],  
                laravelData: {},             
                total:0,
                options: [],
                value5: []
            }
        },
        mounted() {
           this.fetchData()
        },
        created() {     
        },
        methods:{
            fetchData(page = 1){
                axios.get(this.url,{
                        params: {
                            page: page,
                            cats: this.value5
                        }                    
                    })
                    .then((res) => {
                        this.posts = res.data.blogs.data;  
                        this.options = res.data.categories;
                        this.laravelData = res.data.blogs;
                        //console.log(res);                     
                        this.overview = true;                      
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            filterBlog(cats){                
                axios.get(this.url,{
                        params: {
                            page:'1',
                            cats: cats
                        }                    
                    })
                    .then((res) => {
                        this.posts = res.data.blogs.data;  
                        //this.options = res.data.categories;
                        this.laravelData = res.data.blogs;
                        //console.log(res);                     
                        this.overview = true;                      
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getCategories(cat) {
                //console.log(cat);
                var str = new Array();
                for (var i = 0, len = cat.length; i < len; i++) {
                    str.push( cat[i].title );                    
                }               
                return str.join(", ").toUpperCase();           
            },
            showDetails(data){
                this.post = data;                
                this.overview = false;  
                this.detailPage = true; 
            },
            backOverview(){
                this.detailPage = false; 
                this.overview = true;                  
            }
        },
        filters: {
            moment: function (date) {
                return moment(date).format('MMMM D').toUpperCase();                
            }
        }
    }
</script>
