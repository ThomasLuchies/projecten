package Chess.Core.Pieces;

import Chess.Core.*;
import Chess.Core.Usecases.LocateKing.LocateKing;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertTrue;

public class PawnTests
{
    @Test
    public void callsPromotionHandlerWhenPawnReachesEndOfBoard() throws Field.NoPieceAvailable, Board.FieldNotFound, Piece.MoveNotPossible, LocateKing.KingNotFound
    {
        var promotionHandler = new PromotionHandlerDummy();
        var board = new Board();
        var king = new King(Color.white, board);
        var pawn = new Pawn(Color.white, board, promotionHandler);
        pawn.setMoves(2);
        board.setPiece(new Coords(1, 1), king);
        board.setPiece(new Coords(1, 7), pawn);
        board.setPiece(new Coords(2, 8), new Knight(Color.black, board));
        pawn.move(State.active, new Coords(1,7), new Coords(2,8));
        assertTrue(promotionHandler.isCalled);
        assertEquals(3, pawn.getMoves());
        assertTrue(board.pieceOnField(new Coords(2,8)));
    }

    @Test
    public void canEnPassantMove() throws Field.NoPieceAvailable, Board.FieldNotFound, Piece.MoveNotPossible, LocateKing.KingNotFound
    {
        var board = new Board();
        var blackPawn = new Pawn(Color.black, board);
        var whitePawn = new Pawn(Color.white, board);
        blackPawn.setMoves(1);
        board.setPiece(new Coords(8, 5), blackPawn);
        board.setPiece(new Coords(7, 5), whitePawn);
        whitePawn.move(State.active, new Coords(7, 5), new Coords(8,6));
        assertEquals(1, whitePawn.getMoves());
    }
}