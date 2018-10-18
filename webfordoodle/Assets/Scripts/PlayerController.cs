using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PlayerController : MonoBehaviour {

	public Transform cameraTrans;

	public gamemanager gamemanagerscript;


	public int score=0;


	float playerfirstpos;
	[SerializeField]
	float moveSpd;
	[SerializeField]
	float jumpPower;
	Rigidbody2D myRigidbody2d;
	SpriteRenderer mySpriteRenderer;


	public bool isdead=false;

	void Awake(){
		
		myRigidbody2d = GetComponent<Rigidbody2D> ();
		mySpriteRenderer = GetComponent<SpriteRenderer> ();
	}

	void Start(){

		playerfirstpos = transform.position.y;
	
	}


	// Update is called once per frame
	void Update(){
		FlipCharacter ();
		checkifdead ();
		setscore ();
	}

	void FixedUpdate () {
		Movement ();
	}

	void OnCollisionEnter2D(Collision2D col){
		if (col.gameObject.CompareTag ("jumpable")) {
			myRigidbody2d.velocity = new Vector2 (myRigidbody2d.velocity.x, 0f);
			myRigidbody2d.AddForce (Vector2.up * jumpPower);
		}
	}
	void Movement(){
		Vector3 pos = myRigidbody2d.position;
		myRigidbody2d.AddForce (Vector2.right * Input.GetAxis("Horizontal") * moveSpd);
		pos.x = Mathf.Clamp (pos.x, -2f, 2f);
		myRigidbody2d.position = pos;


	}

	void FlipCharacter(){
		if (Input.GetAxisRaw ("Horizontal") < 0)
			mySpriteRenderer.flipX = true;
		else if (Input.GetAxisRaw ("Horizontal") > 0)
			mySpriteRenderer.flipY = false;
	}

	void checkifdead(){
		
		if (transform.position.y <= cameraTrans.position.y - 6f && !isdead) {
			isdead = true;
			gamemanagerscript.gameover ();
		}
	}

	void setscore(){
		score = Mathf.Max (score, Mathf.FloorToInt (transform.position.y - playerfirstpos)*10);
	}
}
