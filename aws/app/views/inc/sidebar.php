<ul class="sidebar navbar-nav">
    <li class="nav-item active">
    <a class="nav-link" href="../users/main">
        <span>Anasayfa</span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link" href="../users/customerdetails">
        <span>Müşteri Detayları</span>
    </a>
    </li>
    <li class="nav-item ">
    <a class="nav-link" href="../users/getShipNames">
        <span>Gemi İsimleri</span>
    </a>
    </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href=" " id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span>Ürünler</span>        
    </a>
    <div id="productList" class="dropdown-menu" aria-labelledby="pagesDropdown">
        <template v-for="(product, index) in productListResult[0].awsUserProductGroups">
            <h6 class="dropdown-header" v-text="product.groupName"></h6>
            <span v-for="(productName,index) in product.awsUserProducts">
                <span v-if="productName.policyType == 'A'"><a class="dropdown-item" href="../users/getProductDetailAbonman" v.text="productName.displayName" >{{ productName.displayName }}</a></span>
                <span v-if="productName.policyType == 'K'"><a class="dropdown-item" href="../users/getProductDetailKati" v.text="productName.displayName" >{{ productName.displayName }}</a></span>
                <span v-if="productName.policyType == 'N'"><a class="dropdown-item" href="../users/getProductDetailKaskomAtlas" v.text="productName.displayName" >{{ productName.displayName }}</a></span>
            </span>
            </span>
        </template>
        </div>
    </li>
</ul>
<script src="../js/vue/vue.min.js"></script>
<script type="text/javascript">
    console.clear()
    var productList = new Vue({
    el:'#productList',
    data: function(){
        return {
            productListResult: [],
        }
        },
        created() {
            this.getProductData();
        },
        methods: {
        getProductData: function(){
             let productListData = <?php echo json_encode($_SESSION['userProducts']) ?> 
             this.productListResult.push(productListData);
        },
    }
 });
</script>

