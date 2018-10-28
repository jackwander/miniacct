<template>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="float-left">
            Balance: <b>{{balance | toCurrency}}</b>
          </div>
          <div class="float-right">
            <a href="#" @click="addForm()"> <i class="fas fa-plus"></i> </a>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <th>Date</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Detail</th>
              </thead>
              <tbody>
               <tr v-for="trans in transactions" v-bind:key="trans.at_id">
                  <td>{{trans.date | formatDate}}</td>
                  <td>{{trans.amount | toCurrency}}</td>
                  <td>{{trans.type}}</td>
                  <td>{{trans.detail}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><button class="page-link" href="#" @click="fetchTransactions(pagination.prev_page_url)">Previous</button></li>
              <li class="page-item disabled"><a class="page-link text-dark" href="#">{{pagination.current_page}} of {{pagination.last_page}}</a></li>
              <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
                <button class="page-link" href="#" @click="fetchTransactions(pagination.next_page_url)">Next</button></li>
              </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props : [
      'acct_id'
      ],
    data() {
      return {
        transactions: {},
        pagination: {},
        balance: ''
      }
    },

    created() {
      this.fetchTransactions();
      this.fetchBalance();
    },

    methods: {
      fetchTransactions(page_url) {
        let vm = this;
        page_url = page_url || `/api/user/accounts/transactions/${vm.acct_id}`
        fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.transactions = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch( err => console.log(err));
      },
      makePagination(meta, links) {
        let pagination = {
          current_page: meta.current_page,
          last_page: meta.last_page,
          next_page_url: links.next,
          prev_page_url: links.prev
        }

        this.pagination = pagination;
      },
      fetchBalance() {
        let vm = this;
        axios.get(`/api/user/accounts/balance/${vm.acct_id}`)
          .then(function (response) {
            vm.balance = response.data;
          })
          .catch(function (error) {
            console.log(error);
          })
          .then(function () {
            // always executed
          }); 
      },

      async addForm() {
        let vm = this;
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear(); 
 
        today = yyyy +'-'+ mm+'-' +dd;
        let formData = new FormData();
        console.log(today);
        const {value: formValues} = await swal({
          title: 'Add Transaction',
          html:
          '<input  type="date" id="swal-input1" max="'+today+'" class="swal2-input">' +
          '<input  type="number" min="0" id="swal-input2" class="swal2-input" placeholder="Amount">' +
          '<select id="swal-input3" class="swal2-input"><option>Deposit</option><option>Withdraw</option></select>'+
          '<input  id="swal-input4" class="swal2-input" placeholder="Detail">',
          focusConfirm: false,
          showCancelButton: true,
          preConfirm: () => {
            return [
            document.getElementById('swal-input1').value,
            document.getElementById('swal-input2').value,
            document.getElementById('swal-input3').value,
            document.getElementById('swal-input4').value
            ]
          }
        })

        if (formValues) {

          formData.append('acct_id', vm.acct_id);
          formData.append('date', formValues[0]);
          formData.append('amount', formValues[1]);
          formData.append('type', formValues[2]);
          formData.append('detail', formValues[3]);

          axios.post('/api/user/accounts/transactions/store', formData)
          .then(function (response) {
              swal({
                type: 'success',
                title: 'Congrats',
                text: 'Your transaction is successfully added!',
              });
              vm.fetchTransactions();
              vm.fetchBalance();
          })
          .catch(function (error) {
            console.log(error);
          });
        }
      },
    }
  }
</script>
