<template>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <div class="float-right">
          <a href="#" @click="addForm()" data-toggle="modal" data-target="#addAccount"> <i class="fas fa-plus"></i> Add Account</a>
        </div>
      </div>
      <div class="card-body d-sm-flex justify-content-sm-center">
        <table class="table">
          <thead>
            <th>Account Name</th>
            <th>Account Detail</th>
          </thead>
          <tbody>
            <tr v-for="account in accounts" v-bind:key="account.acct_id">
              <td><a href="#">{{account.acct_name}}</a></td>
              <td>{{account.acct_detail}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><button class="page-link" href="#" @click="fetchAccounts(pagination.prev_page_url)">Previous</button></li>
            <li class="page-item disabled"><a class="page-link text-dark" href="#">{{pagination.current_page}} of {{pagination.last_page}}</a></li>
            <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item">
              <button class="page-link" href="#" @click="fetchAccounts(pagination.next_page_url)">Next</button></li>
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
      'user_id'
      ],
    data() {
      return {
        pagination: {},
        accounts: {},
        account: {
          acct_name: '',
          acct_detail: '',
        },
      }
    },

    created() {
      this.fetchAccounts();
    },

    methods: {
      fetchAccounts(page_url) {
        let vm = this;
        page_url = page_url || `/api/user/accounts/${this.user_id}`
        fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.accounts = res.data;
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
      async addForm() {
        let vm = this;
        let formData = new FormData();
        const {value: formValues} = await swal({
          title: 'Add your account',
          html:
          '<input id="swal-input1" class="swal2-input" placeholder="Account Name">' +
          '<input id="swal-input2" class="swal2-input" placeholder="Account Detail">',
          focusConfirm: false,
          preConfirm: () => {
            return [
            document.getElementById('swal-input1').value,
            document.getElementById('swal-input2').value
            ]
          }
        })

        if (formValues) {

          formData.append('user_id', vm.user_id);
          formData.append('acct_name', formValues[0]);
          formData.append('acct_detail', formValues[1]);

          axios.post('/api/user/accounts/store', formData)
          .then(function (response) {
            swal({
              type: 'success',
              title: 'Congrats',
              text: 'Your account is added!',
            });
            vm.fetchAccounts();
          })
          .catch(function (error) {
            console.log(error);
          });
        }
      }
    }
  }
</script>
