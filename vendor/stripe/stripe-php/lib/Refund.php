<?php

// File generated from our OpenAPI spec

namespace Stripe;

/**
 * <code>Refund</code> objects allow you to refund a charge that has previously
 * been created but not yet refunded. Funds will be refunded to the credit or debit
 * card that was originally charged.
 *
 * Stripe Tax users with recurring payments and invoices can create <a
 * href="https://stripe.com/docs/api/credit_notes">Credit Notes</a>, which reduce
 * overall tax liability because tax is correctly recalculated and apportioned to
 * the related invoice.
 *
 * Related guide: <a href="https://stripe.com/docs/refunds">Refunds</a>.
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount, in %s.
 * @property null|string|\Stripe\BalanceTransaction $balance_transaction Balance transaction that describes the impact on your account balance.
 * @property null|string|\Stripe\Charge $charge ID of the charge that was refunded.
 * @property int $created Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string $description An arbitrary string attached to the object. Often useful for displaying to users. (Available on non-card refunds only)
 * @property string|\Stripe\BalanceTransaction $failure_balance_transaction If the refund failed, this balance transaction describes the adjustment made on your account balance that reverses the initial balance transaction.
 * @property string $failure_reason If the refund failed, the reason for refund failure if known. Possible values are <code>lost_or_stolen_card</code>, <code>expired_or_canceled_card</code>, or <code>unknown</code>.
 * @property string $instructions_email Email to which refund instructions, if required, are sent to.
 * @property null|\Stripe\StripeObject $metadata Set of <a href="https://stripe.com/docs/api/metadata">key-value pairs</a> that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\StripeObject $next_action
 * @property null|string|\Stripe\PaymentIntent $payment_intent ID of the PaymentIntent that was refunded.
 * @property null|string $reason Reason for the refund, either user-provided (<code>duplicate</code>, <code>fraudulent</code>, or <code>requested_by_customer</code>) or generated by Stripe internally (<code>expired_uncaptured_charge</code>).
 * @property null|string $receipt_number This is the transaction number that appears on email receipts sent for this refund.
 * @property null|string|\Stripe\TransferReversal $source_transfer_reversal The transfer reversal that is associated with the refund. Only present if the charge came from another Stripe account. See the Connect documentation for details.
 * @property null|string $status Status of the refund. For credit card refunds, this can be <code>pending</code>, <code>succeeded</code>, or <code>failed</code>. For other types of refunds, it can be <code>pending</code>, <code>requires_action</code>, <code>succeeded</code>, <code>failed</code>, or <code>canceled</code>. Refer to our <a href="https://stripe.com/docs/refunds#failed-refunds">refunds</a> documentation for more details.
 * @property null|string|\Stripe\TransferReversal $transfer_reversal If the accompanying transfer was reversed, the transfer reversal object. Only applicable if the charge was created using the destination parameter.
 */
class Refund extends ApiResource
{
    const OBJECT_NAME = 'refund';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;

    const FAILURE_REASON_EXPIRED_OR_CANCELED_CARD = 'expired_or_canceled_card';
    const FAILURE_REASON_LOST_OR_STOLEN_CARD = 'lost_or_stolen_card';
    const FAILURE_REASON_UNKNOWN = 'unknown';

    const REASON_DUPLICATE = 'duplicate';
    const REASON_EXPIRED_UNCAPTURED_CHARGE = 'expired_uncaptured_charge';
    const REASON_FRAUDULENT = 'fraudulent';
    const REASON_REQUESTED_BY_CUSTOMER = 'requested_by_customer';

    const STATUS_CANCELED = 'canceled';
    const STATUS_FAILED = 'failed';
    const STATUS_PENDING = 'pending';
    const STATUS_REQUIRES_ACTION = 'requires_action';
    const STATUS_SUCCEEDED = 'succeeded';

    /**
     * @param null|array $params
     * @param null|array|string $opts
     *
     * @throws \Stripe\Exception\ApiErrorException if the request fails
     *
     * @return \Stripe\Refund the canceled refund
     */
    public function cancel($params = null, $opts = null)
    {
        $url = $this->instanceUrl() . '/cancel';
        list($response, $opts) = $this->_request('post', $url, $params, $opts);
        $this->refreshFrom($response, $opts);

        return $this;
    }
}
