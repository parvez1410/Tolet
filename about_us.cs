using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Tolet
{
    #region About_us
    public class About_us
    {
        #region Member Variables
        protected int _ABOUT_US_NO;
        protected string _ABOUT_US;
        protected string _VIDEO_URL;
        protected string _CONTACT_NO;
        protected string _EMAIL;
        protected string _ADDRESS;
        #endregion
        #region Constructors
        public About_us() { }
        public About_us(string ABOUT_US, string VIDEO_URL, string CONTACT_NO, string EMAIL, string ADDRESS)
        {
            this._ABOUT_US=ABOUT_US;
            this._VIDEO_URL=VIDEO_URL;
            this._CONTACT_NO=CONTACT_NO;
            this._EMAIL=EMAIL;
            this._ADDRESS=ADDRESS;
        }
        #endregion
        #region Public Properties
        public virtual int ABOUT_US_NO
        {
            get {return _ABOUT_US_NO;}
            set {_ABOUT_US_NO=value;}
        }
        public virtual string ABOUT_US
        {
            get {return _ABOUT_US;}
            set {_ABOUT_US=value;}
        }
        public virtual string VIDEO_URL
        {
            get {return _VIDEO_URL;}
            set {_VIDEO_URL=value;}
        }
        public virtual string CONTACT_NO
        {
            get {return _CONTACT_NO;}
            set {_CONTACT_NO=value;}
        }
        public virtual string EMAIL
        {
            get {return _EMAIL;}
            set {_EMAIL=value;}
        }
        public virtual string ADDRESS
        {
            get {return _ADDRESS;}
            set {_ADDRESS=value;}
        }
        #endregion
    }
    #endregion
}