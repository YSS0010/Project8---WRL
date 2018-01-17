package yss0010.project8.models;

/**
 * Created by Ysmael_2 on 29/11/2017.
 */

    public class User {

        private String first_name;
        private String email;
        private String uno;
        private String password;
        private String old_password;
        private String new_password;
        private String surname;

        public String getFirst_name() {
            return first_name;
        }

        public String getEmail() {
            return email;
        }

        public String getUno() {
            return uno;
        }


        public void setFirstName(String first_name) {
            this.first_name = first_name;
        }

        public void setEmail(String email) {
            this.email = email;
        }

        public void setPassword(String password) {
            this.password = password;
        }

        public void setOld_password(String old_password) {
            this.old_password = old_password;
        }

        public void setNew_password(String new_password) {
            this.new_password = new_password;
        }

        public void setSurname(String surname) {this.surname = surname;}
}
