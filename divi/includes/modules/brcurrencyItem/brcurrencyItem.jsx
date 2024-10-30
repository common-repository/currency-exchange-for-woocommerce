// External Dependencies
import React, { Component } from 'react';

class BRCE_currency_item extends Component {

  static slug = 'et_pb_brcurrency_item';
  render() {
      return (this.props['line_type']);
  }
}

export default BRCE_currency_item;
