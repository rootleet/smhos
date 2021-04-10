using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace SMHOS
{
    #region Payment
    public class Payment
    {
        #region Member Variables
        protected int _id;
        protected unknown _amount_paid;
        protected unknown _date_paid;
        protected unknown _time_paid;
        protected string _level;
        protected string _method;
        protected int _booking;
        protected int _refund;
        protected int _master;
        protected int _p_count;
        protected string _customer;
        protected string _receptionist;
        protected string _facility;
        protected unknown _amount_owed;
        protected unknown _amount_balance;
        #endregion
        #region Constructors
        public Payment() { }
        public Payment(unknown amount_paid, unknown date_paid, unknown time_paid, string level, string method, int booking, int refund, int master, int p_count, string customer, string receptionist, string facility, unknown amount_owed, unknown amount_balance)
        {
            this._amount_paid=amount_paid;
            this._date_paid=date_paid;
            this._time_paid=time_paid;
            this._level=level;
            this._method=method;
            this._booking=booking;
            this._refund=refund;
            this._master=master;
            this._p_count=p_count;
            this._customer=customer;
            this._receptionist=receptionist;
            this._facility=facility;
            this._amount_owed=amount_owed;
            this._amount_balance=amount_balance;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual unknown Amount_paid
        {
            get {return _amount_paid;}
            set {_amount_paid=value;}
        }
        public virtual unknown Date_paid
        {
            get {return _date_paid;}
            set {_date_paid=value;}
        }
        public virtual unknown Time_paid
        {
            get {return _time_paid;}
            set {_time_paid=value;}
        }
        public virtual string Level
        {
            get {return _level;}
            set {_level=value;}
        }
        public virtual string Method
        {
            get {return _method;}
            set {_method=value;}
        }
        public virtual int Booking
        {
            get {return _booking;}
            set {_booking=value;}
        }
        public virtual int Refund
        {
            get {return _refund;}
            set {_refund=value;}
        }
        public virtual int Master
        {
            get {return _master;}
            set {_master=value;}
        }
        public virtual int P_count
        {
            get {return _p_count;}
            set {_p_count=value;}
        }
        public virtual string Customer
        {
            get {return _customer;}
            set {_customer=value;}
        }
        public virtual string Receptionist
        {
            get {return _receptionist;}
            set {_receptionist=value;}
        }
        public virtual string Facility
        {
            get {return _facility;}
            set {_facility=value;}
        }
        public virtual unknown Amount_owed
        {
            get {return _amount_owed;}
            set {_amount_owed=value;}
        }
        public virtual unknown Amount_balance
        {
            get {return _amount_balance;}
            set {_amount_balance=value;}
        }
        #endregion
    }
    #endregion
}